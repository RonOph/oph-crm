@extends('layouts.admin')
 
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Role
                        </div>
                        <div class="panel-body">
 
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">

                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Project ID</th>
                                            <td> {{ $project->official_project_id }}</td>
                                        </tr>
                                            <th>Contract ID</th>
                                            <td>{{ $project->contract->official_contract_id }}</td>
                                        </tr>

                                            <th>Name</th>
                                            <td>{{ $project->contract->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $project->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>{{ $project->category }}</td>
                                        </tr> 
                                        <tr>
                                            <th>Amount</th>
                                            <td>{{ $project->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Work Hour</th>
                                            <td>{{ $project->total_work_hour }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th> 
                                            <td>{{ $project->status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                                

                                    
                                        

                                        <div class="row"> 
                                            <button type="button" class="btn btn-default" onclick="Cancel()">Back</button>
                                        </div> 
                                     
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div> 
              <script> 
                function Cancel(){
                    location.href="{{ route('projects.index') }}"
                }

               

            </script>

 
@endsection