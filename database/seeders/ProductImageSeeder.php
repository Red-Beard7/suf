<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ProductImage::truncate();

        ProductImage::insert([
            [
                "product_id" => 1,
                "image" => "boys-Puffer-Coat-With-Detachable-Hood-1.jpg",
                "status" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                "product_id" => 1,
                "image" => "boys-Puffer-Coat-With-Detachable-Hood-2.jpg",
                "status" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                "product_id" => 1,
                "image" => "boys-Puffer-Coat-With-Detachable-Hood-3.jpg",
                "status" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
