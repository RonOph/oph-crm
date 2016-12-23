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
                            Project
                        </div>
                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Errors:</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
            
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                     {!! Form::model($project, ['method'=>'PATCH','route'=>['projects.update',$project->id]] ) !!}                                     

                                        <div class="form-group">
                                            <label>Contract ID</label>
                                            {!! Form::select('contract_id',$contracts, $project->contract_id ,['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $project->name }}">
                                        </div>

                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description">{{ $project->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            {!! Form::select('category',$categories, $project->category ,['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                                <input type="text" class="form-control" name="amount" value="{{ $project->amount }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Total Work Hour</label>
                                                <input type="text" class="form-control" name="total_work_hour" value="{{ $project->total_work_hour }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            {!! Form::select('status',$status, $project->status ,['class'=>'form-control']) !!}
                                        </div>


                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-default" onclick="Cancel()">Cancel</button>
                                        </div>

                                     {!! Form::close() !!}
                                     
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