<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Session\Store;
use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->email);
        $user->type = $request->type;

        if($request->hasFile('file'))
        {
            $avatar = $request->file('file');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/users_avatars/'.$filename));
            $user->avatar_url = '/uploads/users_avatars/' . $filename;

        }


        $user->save();

        session()->flash("success", "Insert Successfully");
        return redirect(route("users.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = bcrypt($request->email);
        }
        $user->type = $request->type;

        if($request->hasFile('file'))
        {
            $avatar = $request->file('file');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/users_avatars/'.$filename));
            $user->avatar_url = '/uploads/users_avatars/' . $filename;
        }


        $user->save();

        session()->flash("success", "Update Successfully");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash("success", "Delete successfully");
        return back();
    }
}
