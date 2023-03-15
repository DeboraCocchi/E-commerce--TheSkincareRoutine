<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id','desc')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $form_data = $request->all();
        $new_product= new Product();

        if(array_key_exists('brand',$form_data)){
            $form_data['slug']=Product::generateSlug($form_data['name'],$form_data['brand']);
        }else{
            $form_data['slug']=Product::generateSlug($form_data['name'],$form_data['code']);
        }

        $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('uploads', $form_data['image']);

        $new_product->fill($form_data);
        $new_product->save();

        return redirect()->route('admin.products.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $category=Category::where('id', $product->category_id);
        return view('admin.products.show', compact('product','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $form_data = $request->all();
        try{
                $request->validate([
                    'name'=>'required|min:3|max:255',
                    'price'=>'required|numeric',
                    'code'=>'required|min:8|max:8',
                    'description'=>'max:500'
                ]);
                }catch(\Illuminate\Validation\ValidationException $e){
                    dd($form_data, $product);
                    dd($e->errors());
                }
        if($form_data['name'] != $product->name || $form_data['brand'] != $product->brand){
            $product['slug']=Product::generateSlug($form_data['name'], $form_data['brand']);
        }else{$form_data['slug']=$product->slug ;}
        if(array_key_exists('image',$form_data)){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }else{
            $form_data['image']=$product->image;
        }

        $product->update($form_data);
        return redirect()->route('admin.products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
