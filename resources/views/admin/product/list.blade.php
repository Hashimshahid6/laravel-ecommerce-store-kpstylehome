@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('product.add')}}" class="btn btn-primary">Add New Product</a>
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
                <h3 class="card-title">Product List</h3>
              </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Category Name</th>
                      <th>Sub Category Name</th>
                      <th>Brand Name</th>
                      <th>Slug</th>
                      <th>Old Price</th>
                      <th>Price</th>
                      <th>Short Description</th>
                      <th>Description</th>
                      <th>Additional Information</th>
                      <th>Shipping & Returns</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->title}}</td>
                      <td>{{$product->category_nameW}}</td>
                      <td>{{$product->sub_category_name}}</td>
                      <td>{{$product->brand_name}}</td>
                      <td>{{$product->slug}}</td>
                      <td>{{$product->old_price}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->short_description}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->additional_information}}</td>
                      <td>{{$product->shipping_returns}}</td>
                      <td>{{$product->created_by_name}}</td>
                      <td>
                        @if($product->status == 1)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td>{{$product->created_at}}</td>
                      <td>
                        <div class="d-flex">
                          <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="{{route('product.delete', $product->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                            <i class="fas fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  <tbody>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection