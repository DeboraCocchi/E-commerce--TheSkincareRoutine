<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $array_products=config('db.products');
        foreach($array_products as $product){
            $new_product = new Product();
            $new_product->name= $product['Nome'];
            $new_product->brand= $product['Brand'];
            $new_product->category_id= $product['Tipo'];
            $new_product->price= $product['Price'];
            $new_product->image= $product['Immagine'];
            $new_product->code= $faker->ean8();
            $new_product->description= $faker->paragraph();
            $new_product->slug= Product::generateSlug($new_product->name,$new_product->brand);
            $new_product->image_original_name=$new_product->slug;
            $new_product->save();

        }
    }
}
