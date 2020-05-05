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
</section>
<section class="content">
    <div class="container-fluid">

        <div class="row">

            {{-- Category create form --}}
            <div class="col-md-6">
                <div class="card">
                    @include('includes.message')
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="">
                            </div>
                            @error('name')
                            <small class="form-text text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-sm float-right">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Category List section --}}
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Lists</h3>

                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                               {{$category->links()}}
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
                                    <td>
                                        {{$cat->name}}
                                        <br>
                                        <small>
                                            <a href="" type="submit" role="button"
                                                onclick="event.preventDefault();
                                                if(confirm('Are you sure!')){
                                                    $('#form-delete-{{$cat->id}}').submit();
                                                }
                                                ">
                                                Delete
                                            </a>
                                        </small>
                                        <form style="display:none" id="form-delete-{{$cat->id}}" action="{{route('category.destroy',$cat->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                    <td>
                                        {{$cat->created_at->diffForHumans()}}
                                    </td>
                                    <td>{{$cat->updated_at->diffForHumans()}}</td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="4">
                                        No category available
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
