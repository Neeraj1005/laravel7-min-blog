@extends('layouts.admin')
@section('title', 'User section')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Users:{{count($users)}}
                <a name="createbtn" id="cratebtn" class="btn btn-primary btn-sm float-right" href="{{route('users.create')}}" role="button">
                    Create
                </a>
            </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}<br>
                                <small>
                                    <a href="" type="submit" role="button"
                                        onclick="event.preventDefault();
                                        if(confirm('Are you sure!')){
                                            // document.getElementById('form-delete-{{$user->id}}').submit();//js
                                            $('#form-delete-{{$user->id}}').submit();//jquery
                                        }
                                        ">
                                        Delete
                                    </a>
                                </small>
                                <form style="display:none" id="{{'form-delete-'.$user->id}}" action="{{route('users.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                            <td>
                                <img
                                src="{{$user->photo ? $user->photo->file : '/images/default-avatar.jpeg'}}"
                                alt="your avatar"
                                class="rounded-full mr-2"
                                width="50"
                                height="50"
                            >

                            </td>
                            <td>
                                {{($user->role->name) ?? ''}}
                            </td>
                            <td>{{ ($user->is_active == 1) ? 'Active' : 'Blocked' }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{$user->updated_at->diffForHumans() }}</td>
                            <td>
                                <a name="editbtn" id="editbtn" class="btn btn-primary" href="{{route('users.edit',$user->id)}}" role="button">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
