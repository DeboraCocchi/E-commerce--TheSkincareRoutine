<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','brand','price','category_id','image','code','description','slug','image_original_name'];

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public static function generateSlug($name, $brand){
        $slug = Str::slug($name.'-'.$brand);
        $original_slug = $slug;
        $c = 1;
        $prod_exists = Product::where('slug',$slug)->first();
        while($prod_exists){
            $slug = $original_slug . '-' . $c;
            $prod_exists = Product::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }
}


