<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

use App\Http\Requests; 

use Image;

class ClientController extends Controller
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
        $clients = Client::orderBy('created_at','desc')->paginate(5);
        return view('admin.client-list',['clients'=>$clients])->with('i',($request->input('page',1) - 1) * 5);
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
            'status'=>'required|in:pending,active,inactive'            
            ]);
         
        $client = new Client($request->input());

        if ($request->file('logo')->isValid()) {
           $file = $request->file('logo');
           $fileName = time().'.'.$file->getClientOriginalExtension();
           $path = public_path('images/'.$fileName);
           
           Image::make($file->getRealPath())->resize(100,100)->save($path);
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
        
        $this->validate($request,[
            'logo'=>'image|mimes:jpeg,png,jpg',
            'company_name'=>'required|max:255',
            'owner_name'=>'required',
            'email'=>'required|email|unique:clients,email,'.$id,
            'mobile_number'=>'digits:11',
            'website_url'=>'active_url',
            'status'=>'required|in:pending,active,inactive'  
            ]);

        Client::find($id)->update($request->all());

        if($request->hasFile('logo')){

            if($request->file('logo')->isValid()){

                $file = $request->file('logo');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $path = public_path('images/'.$fileName);
                Image::make($file->getRealPath())->resize(100,100)->save($path);
                Client::where('id','=',$id)->update(['logo'=>$fileName]);
 
            }
        }


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
