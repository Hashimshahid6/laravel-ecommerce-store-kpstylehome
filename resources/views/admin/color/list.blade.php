@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Color List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('color.add')}}" class="btn btn-primary">Add New Color</a>
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
                <h3 class="card-title">Color List</h3>
              </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Color Name</th>
                      <th>Color Code</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($colors as $color)
                    <tr>
                      <td> {{$color->id}} </td>
                      <td> {{$color->name}} </td>
                      <td> {{$color->code}} </td>
                      <td> {{$color->created_by_name}} </td>
                      <td> {{($color->status == 1) ? 'Active' : 'Inactive'}} </td>
                      <td> {{date('d-m-Y', strtotime($color->created_at))}} </td>
                      <td>
                        <div class="d-flex">
                          <a href="{{route('color.edit', $color->id)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="{{route('color.delete', $color->id)}}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  {{$colors->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection