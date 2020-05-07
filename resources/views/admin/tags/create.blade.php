@extends('layouts.admin')
@section('title', 'Create Category')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Tag</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Tag</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        <div class="row">

            {{-- tags create form --}}
            <div class="col-md-6">
                <div class="card">
                    @include('includes.message')
                    <form action="{{route('tags.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tag</label>
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
                        <h3 class="card-title">Tag Lists</h3>

                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                               {{$tags->links()}}
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
                                @forelse($tags as $tag)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>
                                        {{$tag->name}}
                                        <br>
                                        <small><a href="{{route('tags.show',$tag->name)}}">View</a></small>
                                        <small>
                                            <a href="" type="submit" role="button"
                                                onclick="event.preventDefault();
                                                if(confirm('Are you sure!')){
                                                    $('#form-delete-{{$tag->id}}').submit();
                                                }
                                                ">
                                                Delete
                                            </a>
                                        </small>
                                        <form style="display:none" id="form-delete-{{$tag->id}}" action="{{route('tags.destroy',$tag->name)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                    <td>
                                        {{$tag->created_at->diffForHumans()}}
                                    </td>
                                    <td>{{$tag->updated_at->diffForHumans()}}</td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="4">
                                        No tags available
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
