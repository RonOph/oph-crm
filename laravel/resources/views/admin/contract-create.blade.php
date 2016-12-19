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
                            Contract
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
                                    
                                     {!! Form::open(array('route' => 'contracts.store','method'=>'POST')) !!}
                                        

                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name"  placeholder="Enter contract name/title " value="{{ old('name') }}"> 
                                        </div>                                         

                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control" name="amount"  placeholder="Enter amount" value="{{ old('name') }}"> 
                                        </div>

                                        <div class="form-group">
                                            <label>Start Date</label> 
                                            <input type='text' class="form-control" data-provide="datepicker" name="start_date" id="startdatepicker" />
                                        </div>

                                        <div class="form-group">
                                            <label>End Date</label> 
                                            <input type='text' class="form-control" data-provide="datepicker" name="end_date" id="enddatepicker" />
                                        </div>

                                        <div class="form-group">
                                            <label>Collection Schedule</label> 
                                            {!! Form::select('collection_schedule',['Monthly'=>'Monthly','Quarterly'=>'Quarterly','Yearly'=>'Yearly'], old('collection_schedule') ,['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Client</label> 
                                            {!! Form::select('client_id',$clients, old('client_id') ,['class'=>'form-control']) !!}
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Supporting Documents</label>
                                            <input type="file" name="supporting_documents" class="form-control">
                                        </div> -->

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
                    location.href="{{ route('contracts.index') }}"
                }

               

            </script>

 
@endsection