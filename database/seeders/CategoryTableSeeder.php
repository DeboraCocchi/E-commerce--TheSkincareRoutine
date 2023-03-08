<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data=['extra', 'makeup', 'perfume', 'skincare'];
       foreach($data as $item){
           $new_category = new Category();
           $new_category->type = $item;
           $new_category->save();
       }
    }
}
