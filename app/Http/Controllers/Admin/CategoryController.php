<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function list()
    {
        $data['categories'] = CategoryModel::categories();
        $data['header_title'] = 'Category List';
        return view('admin.category.list', $data);
    }//

    public function add()
    {
        $data['header_title'] = 'Add New Category';
        return view('admin.category.add', $data);
    }//

    public function insert(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:category',
        ]);

        $category = new CategoryModel();
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = $request->status;
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth()->user()->id;
        $category->save();

        return redirect()->route('category.list')->with('success', 'Category Created Successfully');
    }//

    public function update($id, Request $request){
        request()->validate([
            'slug' => 'required|unique:category,slug,'.$id,
        ]);
        $category = CategoryModel::find($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = $request->status;
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth()->user()->id;
        $category->save();

        return redirect()->route('category.list')->with('success', 'Category Successfully Updated');
    }//a
    public function edit($id)
    {
        $data['category'] = CategoryModel::find($id);
        $data['header_title'] = 'Edit Category';
        return view('admin.category.edit', $data);
    }//

    public function delete($id)
    {
        $category = CategoryModel::find($id);
        $category->is_deleted = 1;
        $category->save();
        return redirect()->route('category.list')->with('success', 'Category Successfully Deleted');
    }//

}
