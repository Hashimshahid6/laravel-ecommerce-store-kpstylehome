@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{route('admin.add')}}" class="btn btn-primary">Add New Admin</a>
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
                <h3 class="card-title">Admin List</h3>
              </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($usersRecord as $userRecord)
                    <tr>
                      <td>{{$userRecord->id}}</td>
                      <td>{{$userRecord->name}}</td>
                      <td>{{$userRecord->email}}</td>
                      <td>{{$userRecord->status == 1 ? 'Active' : 'Inactive'}}</td>
                      <td>
                        <a href="{{route('admin.edit', $userRecord->id)}}" class="btn-sm btn-primary">Edit</a>
                        <a href="{{route('admin.delete', $userRecord->id)}}" class="btn-sm btn-danger">Delete</a>
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