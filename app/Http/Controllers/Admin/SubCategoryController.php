<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;

class SubCategoryController extends Controller
{
    public function list(){
        $data['subcategories'] = SubCategoryModel::SubCategories();
        $data['header_title'] = 'Sub Category List';
        return view('admin.subcategory.list', $data);
    }//

    public function add(){
        $data['categories'] = CategoryModel::categories();
        $data['header_title'] = 'Add New Sub Category';
        return view('admin.subcategory.add', $data);
    }//

    public function insert(Request $request){
        request()->validate([
            'slug' => 'required|unique:sub_category',
        ]);

        $subcategory = new SubCategoryModel();
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth()->user()->id;
        $subcategory->save();
        return redirect()->route('sub_category.list')->with('success', 'Sub Category Created Successfully');
    }//

    public function update($id, Request $request){
        request()->validate([
            'slug' => 'required|unique:sub_category,slug,'.$id,
        ]);
        $subcategory = SubCategoryModel::find($id);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth()->user()->id;
        $subcategory->save();
        return redirect()->route('sub_category.list')->with('success', 'Sub Category Successfully Updated');
    }//

    public function edit($id){
        $data['categories'] = CategoryModel::categories();
        $data['subcategory'] = SubCategoryModel::find($id);
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.subcategory.edit', $data);
    }//

    public function delete($id){
        $subcategory= SubCategoryModel::find($id);
        $subcategory->is_deleted = 1;
        $subcategory->save();
        return redirect()->route('sub_category.list')->with('success', 'Sub Category Deleted Successfully');
    }//
}
