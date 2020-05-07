<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',1)->latest()->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $roles = Role::all();
        return view('admin.users.create',compact('user','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $user)
    {
        if (trim($request->password) == '') {//if password field is empty then fill all request except password field
            $input = $request->except('password');
        } else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        if($request->hasFile('photo_id'))
        {

            $originalname = $request->photo_id->getClientOriginalName();

            $extension = $request->photo_id->extension();

            $uploadpath = $request->photo_id->storeAs('media', $originalname, 'public');//filepath=>media/filename.png


            $photo = Photo::create(['file'=> $originalname]);

            $input['photo_id'] = $photo->id;

        }

        $user->create($input);

        return redirect(route('users.index'))->with('status','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // dd($user->photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        if(trim($request->password) == ''){//if password field is empty then fill all request except password field
            $input = $request->except('password');
        } else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        if($request->hasFile('path'))
        {

            $originalname = $request->path->getClientOriginalName();

            $extension = $request->path->extension();

            $uploadpath = $request->path->storeAs('media', $originalname, 'public');//filepath=>media/filename.png

            if ($user->photo_id != Null) {//if their is already photo then update it

                $user->photo->update([

                    'file'=>$originalname

                    ]);
            } else { //if no photo then associate and create

                $user->photo()->associate(
                    Photo::create([
                        'file' => $originalname
                    ])
                );
            }

            $user->save();

        }

        $user->update($input);

        return redirect(route('users.index'))->with('status','User created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('status','deleted successfully');
    }
}
