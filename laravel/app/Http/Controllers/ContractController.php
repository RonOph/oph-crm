<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contract;
use DB;

class ContractController extends Controller
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
        
        $contracts = Contract::orderBy('created_at','desc')->paginate(5);
        return view('admin.contract-list',['contracts'=>$contracts])->with('i',($request->input('page',1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = ['Active'=>'Active',
                'Pending'=>'Pending',
                'Renewed'=>'Renewed',
                'Expired'=>'Ended'];
        $res = DB::table('clients')->orderBy('company_name','asc')->get();
        $clients = [];
        if(count($res) > 0){
            foreach($res as $client){
                $clients[$client->id] = $client->company_name;
            }
        }

        return view('admin.contract-create',['status'=>$status,'clients'=>$clients]);

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
            'client_id'=>'required',
            'amount'=>'required|numeric',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'collection_schedule'=>'required',
            'client_id'=>'required'
            ]);

        $contract = new Contract($request->input());
        $contract->save();
        $id = $contract->id;

        DB::table('contracts')
                ->where('id', $id)
                ->update(['official_contract_id' =>"C".date("Y").sprintf("%04d",$id)]);
                      
        return redirect()->route('contracts.index')->with('success','Your contract added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::find($id);
        return view('admin.contract-show',['contract'=>$contract]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::find($id);
        $status = [
                'Pending'=>'Pending',
                'Active'=>'Active',
                'Renewed'=>'Renewed',
                'Expired'=>'Ended'
                ];

        $res = DB::table('clients')->orderBy('company_name','asc')->get();
        $clients = [];
        if(count($res) > 0){
            foreach($res as $client){
                $clients[$client->id] = $client->company_name;
            }
        }
        return view('admin.contract-edit',['types'=>$types,'clients'=>$clients,'contract'=>$contract]);
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
            'client_id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'status'=>'required'
            ]);

        Contract::find($id)->update($request->all());

        return redirect()->route('contracts.index')->with('success','Your contract updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contract::find($id)->delete();
        return redirect()->route('contracts.index')->with('success','Your credential deleted successfully.');
            }
}
