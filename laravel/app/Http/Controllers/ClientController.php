<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

use App\Http\Requests;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $clients = Client::orderBy('created_at','desc')->paginate(5);
        return view('admin.client-list',['clients'=>$clients]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.client-create');
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
            'logo'=>'required|image|mimes:jpeg,png,jpg',
            'company_name'=>'required|max:255',
            'owner_name'=>'required',
            'email'=>'required|email|unique:clients',
            'mobile_number'=>'digits:11',
            'website_url'=>'active_url',
            'contract_status'=>'required|in:Pending,Active,Inactive'            
            ]);
         
        $client = new Client($request->input());


        if ($request->file('logo')->isValid()) {
           $file = $request->file('logo');
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/images/' ;
           $request->file('logo')->move($destinationPath, $fileName);
           $client->logo =  $fileName;
        }

        $client->save();
        return redirect()->route('clients.index')->with('success','Your client added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('admin.client-show',['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
         return view('admin.client-edit', ['client'=>$client]);
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
            'company_name'=>'required|max:255',
            'owner_name'=>'required',
            'email'=>'required|email|unique:clients,email,'.$id,
            'contact_number'=>'required|digits:11',
            'website_url'=>'required|active_url'
            ]);
        Client::find($id)->update($request->all());
        return redirect()->route('clients.index')->with('success','Your client updated successfully.');

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

        Client::find($id)->delete();
        return redirect()->route('clients.index')->with('success','Client deleted successfully!');
    }
}
