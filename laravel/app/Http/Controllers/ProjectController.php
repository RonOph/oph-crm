<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;

use DB;

class ProjectController extends Controller
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
        $projects = Project::orderBy('created_at','desc')->paginate(5);

        return view('admin.project-list',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = ['Pending'=>'Pending','On-Hold'=>'On-Hold','On-Progress'=>'On-Progress','Launched'=>'Launched'];
        $cats = DB::table('categories')->orderBy('name','asc')->get();
        $categories = [];
        if(count($cats) > 0){
            foreach($cats as $cat){
                $categories[$cat->code] = $cat->name;
            }
        }

        
        $res = DB::table('contracts')->select('id','official_contract_id','name')->orderBy('created_at','asc')->get();
        $contracts = [];
        if(count($res) > 0){
            foreach($res as $contract){
                $contracts[$contract->id] = $contract->official_contract_id.' - '.$contract->name;
            }
        }

        return view('admin.project-create',['contracts'=>$contracts,'categories'=>$categories,'status'=>$status]);
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
            'contract_id'=>'bail|required|exists:contracts,id',
            'name'=>'required',
            'category'=>'required|exists:categories,code',
            'amount'=>'required|numeric',
            'total_work_hour'=>'required|numeric',
            'status'=>'required'
            ]);

        $contract = DB::table('contracts')->select('date_signed')->where('id','=',$request->input('contract_id'))->first();
        $official_project_id = $request->input('category').date('Ymd',strtotime($contract->date_signed));
        $inputs = array_merge($request->input(),['official_project_id'=>$official_project_id]);
        $project = new Project($inputs);
        $project->save();
        return redirect()->route('projects.index')->with('success','Your project added successfully.');
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
        $project = Project::find($id);

        return view('admin.project-show',['project'=>$project]);
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
        $status = ['Pending'=>'Pending','On-Hold'=>'On-Hold','On-Progress'=>'On-Progress','Launched'=>'Launched'];
        $cats = DB::table('categories')->orderBy('name','asc')->get();
        $categories = [];
        if(count($cats) > 0){
            foreach($cats as $cat){
                $categories[$cat->code] = $cat->name;
            }
        }

        
        $res = DB::table('contracts')->select('id','official_contract_id','name')->orderBy('created_at','asc')->get();
        $contracts = [];
        if(count($res) > 0){
            foreach($res as $contract){
                $contracts[$contract->id] = $contract->official_contract_id.' - '.$contract->name;
            }
        }

        $project = DB::table('projects')->find($id);

        return view('admin.project-edit',['contracts'=>$contracts,'categories'=>$categories,'status'=>$status,'project'=>$project]);
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
            'contract_id'=>'bail|required|exists:contracts,id',
            'name'=>'required',
            'category'=>'required|exists:categories,code',
            'amount'=>'required|numeric',
            'total_work_hour'=>'required|numeric',
            'status'=>'required'
            ]);

        Project::find($id)->update($request->all());

        $contract = DB::table('contracts')->select('date_signed')->where('id','=',$request->input('contract_id'))->first();
        $official_project_id = $request->input('category').date('Ymd',strtotime($contract->date_signed));

        Project::find($id)->update(['official_project_id'=>$official_project_id]);
        return redirect()->route('projects.index')->with('success','Your project updated successfully.');
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
        Project::find($id)->delete();
        return redirect()->route('projects.index')->with('success','Your project deleted successfully.');
    }
}
