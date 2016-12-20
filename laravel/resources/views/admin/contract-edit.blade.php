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
                                    
                                     {!! Form::model($contract, ['method'=>'PATCH','route'=>['contracts.update',$contract->id]] ) !!}                                     

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name"  placeholder="Enter contract name" value="{{ $contract->name }}"> 
                                        </div>

                                        <div class="form-group">
                                            <label>Date Signed</label> 
                                            <input type='text' class="form-control" data-provide="datepicker" name="date_signed" id="datesigneddatepicker" value="{{ $contract->date_signed }}" />
                                        </div>                                   

                                        
                                        <div class="form-group">
                                            <label>Start Date</label> 
                                            <input type='text' class="form-control" data-provide="datepicker" name="start_date" id="startdatepicker" value="{{ $contract->start_date }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>End Date</label> 
                                            <input type='text' class="form-control" data-provide="datepicker" name="end_date" id="enddatepicker" value="{{ $contract->end_date }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Total Amount</label>
                                            <input class="form-control" name="amount"  placeholder="Enter amount" value="{{ $contract->amount }}"> 
                                        </div>

                                        <div class="form-group">
                                            <label>Collection Schedule</label> 
                                            {!! Form::select('collection_schedule',['Monthly'=>'Monthly','Quarterly'=>'Quarterly','Yearly'=>'Yearly'], $contract->collection_schedule ,['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Client</label> 
                                            {!! Form::select('client_id',$clients, $contract->client_id,['class'=>'form-control']) !!}
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Supporting Documents</label>
                                            <input type="file" name="supporting_documents" class="form-control">
                                        </div> -->

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
            <link rel="stylesheet" href="{{ URL::asset('dist/css/jquery-ui-v1.11.2.css') }}">
            <script src="{{ URL::asset('dist/js/jquery-ui-v1.11.2.js') }}"></script>

            <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 

              <script>
              $(function() {
                $( "#datesigneddatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
                $( "#startdatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
                $( "#enddatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
              });
                function Cancel(){
                    location.href="{{ route('contracts.index') }}"
                }

               

            </script>

 
@endsection