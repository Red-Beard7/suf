<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application {
        //  Get Latest Products
        $new = Product::join('admins', 'admins.user_id', 'seller_id')
            ->select('products.*', 'admins.username', 'section.title AS section')
            ->join('categories AS cat', 'products.category_id', '=', 'cat.id')
            ->join('categories AS section', 'cat.section_id', '=', 'section.id')
            ->where(['products.status' => 1])->orderByDesc('products.id')->limit(12)->get();

        $data = [
            'featuredProducts' => Product::products()->where('products.status', 1)
                ->where('is_featured', 'Yes')->get(),
            'newProducts'      => $new,
            'topProducts'      => Product::where('status', 1)
                ->orderByDesc('id')->limit(10)->get()->shuffle(),
            'banners'          => Banner::getBanners(),
            'metaDesc'         => "Purchase fashionable, clothes for Strathmore University conveniently at a good price.",
            'metaKeywords'     => "suf, Su-F, strathmore fashion, buy clothes, fashion, clothes, strathmore ecommerce, suf store, fashion store, delivery, become a seller",
        ];

        return view('home', $data);
    }
}
