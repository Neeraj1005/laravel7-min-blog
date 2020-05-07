@extends('layouts.admin')
@section('title', 'Post section')

@section('content')


<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   @include('includes.message')

<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">CreatePost</h3>
              <a name="createpost" id="" class="btn btn-info btn-sm float-right" href="{{route('posts.create')}}" role="button">Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>PostImage</th>
                  <th>PostName</th>
                  <th>Category</th>
                  <th>Tags</th>
                  <th>Author</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>

                        <td>
                            <img src="{{$post->photo ? $post->photo->file : '/images/default-avatar.jpeg'}}" alt="" width="35px" height="35px">
                        </td>
                        <td>
                            {{$post->title}}<br>
                            <small><a href="{{route('posts.edit',$post->id)}}">Edit</a></small>
                            <small><a href="{{route('posts.show',$post->id)}}">View</a></small>
                            <small>
                                <a href="" type="submit" role="button"
                                    onclick="event.preventDefault();
                                    if(confirm('Are you sure!')){
                                        $('#form-delete-{{$post->id}}').submit();
                                    }
                                    ">
                                    Delete
                                </a>
                            </small>
                            <form style="display:none" id="form-delete-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="POST">
                                @csrf
                                @method('delete')
                            </form>

                        </td>
                        <td>{{($post->category->name) ?? ''}}</td>
                        <td>
                            @forelse($post->tags as $tag)
                                {{($tag->name) ?? ''}}
                                @empty
                                No tags avaliable
                                @endforelse
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                        @empty
                    <td class="text-center" colspan="6">
                        No post is avaliable
                    </td>

                    @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    </div>
</section>
@endsection
