@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('category.add')}}" class="btn btn-primary">Add New Category</a>
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
                <h3 class="card-title">Category List</h3>
              </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
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
                    @foreach($categories as $category)
                    <tr>
                      <td> {{$category->id}} </td>
                      <td> {{$category->name}} </td>
                      <td> {{$category->slug}} </td>
                      <td> {{$category->meta_title}} </td>
                      <td> {{$category->meta_description}} </td>
                      <td> {{$category->meta_keywords}} </td>
                      <td> {{$category->created_by_name}} </td>
                      <td> {{($category->status == 1) ? 'Active' : 'Inactive'}} </td>
                      <td> {{date('d-m-Y', strtotime($category->created_at))}} </td>
                      <td>
                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{route('category.delete', $category->id)}}" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection