<?php

namespace App\Http\Controllers;

use App\Credential;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class CredentialController extends Controller
{

     public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $credentials = Credential::orderBy('created_at','desc')->paginate(5);
        return view('admin.credential-list',['credentials'=>$credentials])->with('i',($request->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ['FTP(File Transfer Protocol)'=>'FTP(File Transfer Protocol)',
                'CPanel(Control Panel)'=>'CPanel(Control Panel)',
                'CMS Wordpress'=>'CMS Wordpress',
                'Webmail'=>'Webmail',
                'Gmail'=>'Gmail'];
        $res = DB::table('clients')->orderBy('company_name','asc')->get();
        $clients = [];
        if(count($res) > 0){
            foreach($res as $client){
                $clients[$client->id] = $client->company_name;
            }
        }

        return view('admin.credential-create',['types'=>$types,'clients'=>$clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'link'=>'required|active_url',
            'username'=>'required',
            'password'=>'required',
            'type'=>'required',
            'client_id'=>'required'
            ]);

        $client = new Credential($request->input());

        $client->save();
        return redirect()->route('credentials.index')->with('success','Your credential added successfully!');
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
        $credential = Credential::find($id);
        return view('admin.credential-show',['credential'=>$credential]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $credential = Credential::find($id);
        $types = ['FTP(File Transfer Protocol)'=>'FTP(File Transfer Protocol)',
                'CPanel(Control Panel)'=>'CPanel(Control Panel)',
                'CMS Wordpress'=>'CMS Wordpress',
                'Webmail'=>'Webmail',
                'Gmail'=>'Gmail'];
        $res = DB::table('clients')->orderBy('company_name','asc')->get();
        $clients = [];
        if(count($res) > 0){
            foreach($res as $client){
                $clients[$client->id] = $client->company_name;
            }
        }
        return view('admin.credential-edit',['types'=>$types,'clients'=>$clients,'credential'=>$credential]);
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
            'link'=>'required|active_url',
            'username'=>'required',
            'password'=>'required',
            'type'=>'required',
            'client_id'=>'required'
            ]);
        Credential::find($id)->update($request->all());

        return redirect()->route('credentials.index')->with('success','Your credential updated successfully.');

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
        Credential::find($id)->delete();
        return redirect()->route('credentials.index')->with('success','Your credential deleted successfully.');

    }
}
