@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Form</li>
                </ol>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">Edit User
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                <input id="name" class="form-control  @error('name') is-invalid @enderror"" type="text" name="name" value="{{$user->name}}">
                                @error('name')
                                        <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"" name="email" id="email" aria-describedby="emailHelpId" placeholder="your_name@example.com" value="{{$user->email}}">
                                    @error('email')
                                        <small class="form-text text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control  @error('role_id') is-invalid @enderror"" name="role_id" id="role">
                                        <option value="0">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{($user->role_id == $role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                                        @endforeach
                                        @error('role_id')
                                            <small class="form-text text-red">{{ $message }}</small>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select id="is_active" class="form-control  @error('is_active') is-invalid @enderror"" name="is_active">
                                        <option value="1" {{($user->is_active == 1)? 'selected' : ''}}>Active</option>
                                        <option value="0" {{($user->is_active == 0)? 'selected' : ''}}>Block</option>
                                        @error('is_active')
                                            <small class="form-text text-red">{{ $message }}</small>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="photo_id">Avatar</label>
                                    <input id="photo_id" class="form-control-file" type="file" name="photo_id">
                                    <small>{{($user->photo) ? $user->photo->file : 'no file uploaded'}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="">
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Submit</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @endsection
