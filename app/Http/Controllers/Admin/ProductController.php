<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list(){
        $data['header_title'] = 'Product List';
        return view('admin.product.list', $data);
    }//

    public function add(){
        $data['header_title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }//

    public function insert(Request $request){
        $title = trim($request->title);
        $product = new ProductModel();
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();
        $slug = Str::slug($title);

        $checkSlug = $product->checkslug($slug);
        if(empty($checkSlug)){
            $product->slug = $slug;
            $product->save();
        }else{
            $product->slug = $slug.'-'.$product->id;
            $product->save();
        }
        $product->save();
        return redirect()->route('product.list')->with('success', 'Product Created Successfully');
    }//
    
    public function update(){
        return redirect()->route('product.list')->with('success', 'Product Successfully Updated');
    }//
    
    public function edit($id){
        $data['product'] = ProductModel::find($id);
        $data['header_title'] = 'Edit Product';
        return view('admin.product.edit', $data);
    }//

    public function delete(){
        return redirect()->route('product.list')->with('success', 'Product Successfully Deleted');
    }//
}
