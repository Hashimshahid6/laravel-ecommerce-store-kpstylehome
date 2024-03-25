@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brands List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('brand.add')}}" class="btn btn-primary">Add New Brand</a>
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
                <h3 class="card-title">Brands List</h3>
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
                    @foreach($brands as $brand)
                    <tr>
                      <td> {{$brand->id}} </td>
                      <td> {{$brand->name}} </td>
                      <td> {{$brand->slug}} </td>
                      <td> {{$brand->meta_title}} </td>
                      <td> {{$brand->meta_description}} </td>
                      <td> {{$brand->meta_keywords}} </td>
                      <td> {{$brand->created_by_name}} </td>
                      <td> {{($brand->status == 1) ? 'Active' : 'Inactive'}} </td>
                      <td> {{date('d-m-Y', strtotime($brand->created_at))}} </td>
                      <td>
                        <div class="d-flex">
                          <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="{{route('brand.delete', $brand->id)}}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  {{$brands->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection