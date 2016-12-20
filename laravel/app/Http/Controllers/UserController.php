<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use DB;

class UserController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->orderBy('created_at','desc')->paginate(5);
        return view('admin.user-list',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->select('id','name')->orderBy('name','desc')->get();
        
        foreach($roles as $role){
            $res[$role->id] = $role->name;
        } 
        return view('admin.user-create',['roles'=>$res]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required|min:6',
            'role_id'=>'exists:roles,id'
            ]);
        
        $user = new User($request->input());
        $user->save();
        return redirect()->route('users.index')->with('success','Your user added successfully!');

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
        $user = User::find($id);
        $roles = DB::table('roles')->select('id','name')->orderBy('name','desc')->get();
        foreach($roles as $role){
            $res[$role->id] =  $role->name;
        }
        return view('admin.user-edit',['user'=>$user,'roles'=>$res]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'min:6|confirmed',
            'password_confirmation'=>'min:6',
            'role_id'=>'exists:roles,id'
            ]);

        $user = User::find($id);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success','Your user updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findorFail($id)->delete();
        return redirect()->route('users.index')->with('success','Your user deleted successfully!');

    }
}
