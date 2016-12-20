<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;

class RoleController extends Controller
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
        $roles = Role::orderBy('created_at','desc')->paginate(5);
        return view('admin.role-list',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles = ['Clients','Contracts','Projects','Collections','Users','Roles'];
       return view('admin.role-create',['roles'=>$roles]);
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
            'name'=>'required'
            ]);

        $permissions = $request->input();
        unset($permissions['_token']);
        unset($permissions['name']);
        $role = new Role(['name'=>$request->input('name'),'permissions'=>json_encode($permissions)]);
        $role->save();
        return redirect()->route('roles.index')->with('success','Your role added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $roles = ['Clients','Contracts','Projects','Collections','Users','Roles'];
        return view('admin.role-show',['role'=>$role,'roles'=>$roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $roles = ['Clients','Contracts','Projects','Collections','Users','Roles'];
        return view('admin.role-edit',['role'=>$role,'roles'=>$roles]);
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
        $role = Role::find($id)->update($request->all());
        $permissions = $request->input();
        unset($permissions['_method']);
        unset($permissions['_token']);
        unset($permissions['name']); 

        if(count($permissions)){
            Role::where('id','=',$id)->update(['permissions'=>json_encode($permissions)]);
        }
        return redirect()->route('roles.index')->with('success','Your role updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Role::find($id)->delete();
        return redirect()->route('roles.index')->with('success','Your role deleted successfully.');
    }
}
