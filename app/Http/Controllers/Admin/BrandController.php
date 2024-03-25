<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use Auth;

class BrandController extends Controller
{
    public function list(){
        $data['brands'] = BrandModel::brand();
        $data['header_title'] = 'Brands List';
        return view('admin.brand.list', $data);
    }//

    public function add()
    {
        $data['header_title'] = 'Add New brand';
        return view('admin.brand.add', $data);
    }//

    public function insert(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:brands',
        ]);

        $brand = new BrandModel();
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = $request->status;
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->created_by = Auth()->user()->id;
        $brand->save();

        return redirect()->route('brand.list')->with('success', 'Brand Created Successfully');
    }//

    public function update($id, Request $request){
        request()->validate([
            'slug' => 'required|unique:brands,slug,'.$id,
        ]);
        $brand = brandModel::find($id);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = $request->status;
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->created_by = Auth()->user()->id;
        $brand->save();

        return redirect()->route('brand.list')->with('success', 'Brand Successfully Updated');
    }//

    public function edit($id)
    {
        $data['brand'] = BrandModel::find($id);
        $data['header_title'] = 'Edit brand';
        return view('admin.brand.edit', $data);
    }//

    public function delete($id)
    {
        $brand = BrandModel::find($id);
        $brand->is_deleted = 1;
        $brand->save();
        return redirect()->route('brand.list')->with('success', 'Brand Successfully Deleted');
    }//
}
