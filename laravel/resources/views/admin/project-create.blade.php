@extends('layouts.admin')
 
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add New</h1>
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
                                    
                                     {!! Form::open(array('route' => 'projects.store','method'=>'POST')) !!}
                                        

                                        <div class="form-group">
                                            <label>Contract ID</label>
                                            {!! Form::select('contract_id',$contracts, old('contract_id') ,['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>

                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            {!! Form::select('category',$categories, old('category') ,['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                                <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Total Work Hour</label>
                                                <input type="text" class="form-control" name="total_work_hour" value="{{ old('total_work_hour') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            {!! Form::select('status',$status, old('status') ,['class'=>'form-control']) !!}
                                        </div>
                                       
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Create</button>
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

            <link rel="stylesheet" href="{{ URL::asset('dist/css/jquery-ui-v1.11.2.css') }}">
            <script src="{{ URL::asset('dist/js/jquery-ui-v1.11.2.js') }}"></script>

            <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 

              <script>
              $(function() {
                $( "#startdatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
                $( "#enddatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
              });
                function Cancel(){
                    location.href="{{ route('projects.index') }}"
                }

               

            </script>

 
@endsection