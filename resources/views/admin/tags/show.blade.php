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

            {{-- tags show --}}
            <div class="col-md-6">
                <div class="card">
                    @include('includes.message')
                    <form action="{{route('tags.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tag:</label>
                                <h3>{{$tag->name}}</h3>
                                </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Category List section --}}
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attached Posts Lists</h3>

                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                               {{-- {{$tags->links()}} --}}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Posts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tag->posts as $tag)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>
                                        {{$tag->title}}
                                        {{-- <br>
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
                                        </form> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="4">
                                        No posts is attached with this tag.
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

