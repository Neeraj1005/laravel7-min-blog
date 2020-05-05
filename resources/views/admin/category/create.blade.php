@extends('layouts.admin')
@section('title', 'Create Category')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                              <label for="">Category</label>
                              <input type="text" class="form-control" name="category" id="category" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">input category</small>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Category Lists</h3>

                          <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                              <li class="page-item"><a class="page-link" href="#">«</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Category</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                              </tr>
                            </thead>
                            <tbody>
                            @forelse($category as $cat)
                            <tr>
                              <td>{{$loop->index + 1}}</td>
                              <td>{{$cat->name}}</td>
                              <td>
                                  {{$cat->created_at->diffForHumans()}}
                              </td>
                              <td>{{$cat->updated_at->diffForHumans()}}</td>
                            </tr>
                            @empty
                                No category available
                            @endforelse

                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>

                </div>
            </div>

            </div>
        </div>
    </section>

    @endsection
