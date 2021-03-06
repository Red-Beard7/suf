<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'section_id',
        'category_id',
        'discount',
        'description',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
    */
    public function section(): BelongsTo {
        return $this->belongsTo(__CLASS__, 'section_id');
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(__CLASS__, 'category_id')->with('section');
    }

    public function categories(): HasMany {
        return $this->hasMany(__CLASS__, 'section_id')
            ->where(['category_id' => null, 'status' => 1])->orderBy('title')
            ->with('subCategories');
    }

    public function subCategories(): HasMany {
        return $this->hasMany(__CLASS__, 'category_id')->has('products')
            ->where('status', 1)->orderBy('title');
    }



    /**
     * STATIC FUNCTIONS
    */
    public static function sections(): array|Collection {
        $getCategories = self::where(['section_id' => null, 'category_id' => null])
            ->with('categories')->where('status', 1)->get();

        try {
            return $getCategories;
        } catch (Exception $e) {
            Log::error($e);
            return $getCategories;
        }
    }

    public static function categoryDetails($url): array {
        $catDetails = self::select(['id', 'title', 'category_id', 'description'])->with(['subCategories' => function($query) {
            $query->select('categories.category_id', 'categories.id', 'title', 'description')
                ->where('status', 1);
        }])->where('id', $url)->first()->toArray();

        if(empty($catDetails['category_id'])) {
            //  Show main Category in breadcrumbs
            $breadcrumbs = '<li class="breadcrumb-item active" aria-current="page">
            <a href="' . url('/products/' . $catDetails['id']) . '">' . $catDetails['title'] . '</a></li>';
        } else {
            //  Show main Category and Sub-category in Breadcrumb
            $mainCategory = self::select(['id', 'title'])->where('id', $catDetails['category_id'])->first()->toArray();
            $breadcrumbs = '<li class="breadcrumb-item" aria-current="page">
            <a href="' . url('/products/' . $mainCategory['id']) . '">' . $mainCategory['title'] . '</a></li>
            <li class="breadcrumb-item active" aria-current="page">
            <a href="' . url('/products/' . $catDetails['id']) . '">' . $catDetails['title'] . '</a></li>';
        }

        $catIds = array();
        $catIds[] = $catDetails['id'];

        foreach($catDetails['sub_categories'] as $subCat) {
            $catIds[] = $subCat['id'];
        }

        return array('catIds' => $catIds, 'catDetails' => $catDetails, 'breadcrumbs' => $breadcrumbs);
    }

    use HasFactory;
}
