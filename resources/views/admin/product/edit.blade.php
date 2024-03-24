@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product Details</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('product.list')}}" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <form method="post" action="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" value="{{old('name', $category->name)}}" id="name"  name="name" placeholder="Enter Name">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" value="{{old('slug', $category->slug)}}" name="slug" placeholder="Slug Ex. URL">
                                    <p class="text-danger">{{ $errors->first('slug') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option {{(old('status', $category->status ) == 1) ? 'selected' : ''}} value="1">Active</option>
                                        <option {{(old('status', $category->status) == 0) ? 'selected' : ''}} value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" value="{{old('meta_title', $category->meta_title)}}" name="meta_title" placeholder="Meta Title">
                                    <p class="text-danger">{{ $errors->first('meta_title') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <input type="text" class="form-control" id="name" value="{{old('meta_description', $category->meta_description)}}" name="meta_description" placeholder="Meta Description">
                                    <p class="text-danger">{{ $errors->first('meta_description') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" id="name" value="{{old('meta_keywords', $category->meta_keywords)}}" name="meta_keywords" placeholder="Meta Keywords">
                                    <p class="text-danger">{{ $errors->first('meta_keywords') }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection