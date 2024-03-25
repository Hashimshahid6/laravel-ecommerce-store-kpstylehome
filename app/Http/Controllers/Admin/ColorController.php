<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;

class ColorController extends Controller
{
    public function list(){
        $data['colors'] = ColorModel::getColors();
        $data['header_title'] = 'Colors List';
        return view('admin.color.list', $data);
    }//

    public function add()
    {
        $data['header_title'] = 'Add New color';
        return view('admin.color.add', $data);
    }//

    public function insert(Request $request)
    {
        request()->validate([
            'code' => 'required|unique:color',
        ]);

        $color = new colorModel();
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = $request->status;
        $color->created_by = Auth()->user()->id;
        $color->save();

        return redirect()->route('color.list')->with('success', 'Color Created Successfully');
    }//

    public function update($id, Request $request){
        request()->validate([
            'code' => 'required|unique:color,code,'.$id,
        ]);
        $color = colorModel::find($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = $request->status;
        $color->created_by = Auth()->user()->id;
        $color->save();

        return redirect()->route('color.list')->with('success', 'Color Successfully Updated');
    }//

    public function edit($id)
    {
        $data['colors'] = ColorModel::find($id);
        $data['header_title'] = 'Edit color';
        return view('admin.color.edit', $data);
    }//

    public function delete($id)
    {
        $color = ColorModel::find($id);
        $color->is_deleted = 1;
        $color->save();
        return redirect()->route('color.list')->with('success', 'color Successfully Deleted');
    }//
}
