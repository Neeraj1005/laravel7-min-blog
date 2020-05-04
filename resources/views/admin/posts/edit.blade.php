@extends('layouts.admin')
@section('title', 'Edit Post')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">Edit Post
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" class="form-control @error('title') is-invalid @enderror"
                                            type="text"
                                            name="title"
                                            value="{{$post->title}}">
                                    @error('title')
                                        <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="category_id">Role</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="role">
                                        <option value="0">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="photo_id">PostImage</label>
                                    <input id="photo_id" class="form-control-file" type="file" name="photo_id">
                                    <small>{{$post->photo->file}}</small>
                                </div>

                                <div class="form-group">
                                    <label for="body">Description</label>
                                    <textarea id="body" class="form-control" name="body" rows="5">{{trim($post->body)}}</textarea>
                                </div>

                                <a name="" id="" class="btn btn-light" href="{{route('posts.index')}}" role="button">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @endsection
