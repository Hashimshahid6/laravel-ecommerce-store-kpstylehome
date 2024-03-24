@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('sub_category.add')}}" class="btn btn-primary">Add New Sub Category</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @include('admin.layouts.messages')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
              </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Sub Category Name</th>
                      <th>Category Name</th>
                      <th>Slug</th>
                      <th>Meta Title</th>
                      <th>Meta Description</th>
                      <th>Meta Keywords</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subcategories as $subcategory)
                      <tr>
                        <td> {{$subcategory->id}} </td>
                        <td> {{$subcategory->name}} </td>
                        <td> {{$subcategory->category_name}} </td>
                        <td> {{$subcategory->slug}} </td>
                        <td> {{$subcategory->meta_title}} </td>
                        <td> {{$subcategory->meta_description}} </td>
                        <td> {{$subcategory->meta_keywords}} </td>
                        <td> {{$subcategory->created_by_name}} </td>
                        <td> {{($subcategory->status == 1) ? 'Active' : 'Inactive'}} </td>
                        <td> {{date('d-m-Y', strtotime($subcategory->created_at))}} </td>
                        <td>
                          <div class="d-flex">
                            <a href="{{route('sub_category.edit', $subcategory->id)}}" class="btn btn-sm btn-primary">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('sub_category.delete', $subcategory->id)}}" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$subcategories->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection