@extends('layouts.admin')
 
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Credential
                        </div>
                        <div class="panel-body"> 
            
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">                                    
 
                                    <div class="form-group">
                                        <label>Name :</label>
                                        {{ $contract->name }} 
                                    </div>
                                    <div class="form-group">
                                        <label>Date Signed :</label>
                                        {{ $contract->date_signed }} 
                                    </div> 


                                    <div class="form-group">
                                        <label>Start Date :</label> 
                                        {{ date('F d, Y',strtotime($contract->start_date)) }}
                                    </div>

                                    <div class="form-group">
                                        <label>End Date :</label> 
                                        {{ date('F d, Y',strtotime($contract->end_date)) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Total Amount :</label>
                                        {{ number_format($contract->amount,2) }} 
                                    </div>

                                    <div class="form-group">
                                        <label>Collection Schedule :</label> 
                                        {{ $contract->collection_schedule }}
                                    </div>

                                    <div class="form-group">
                                        <label>Client :</label> 
                                        {{ $contract->client->company_name }}
                                    </div>                                      

                                    <div class="form-actions">
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
            <script type="text/javascript">
                function Cancel(){
                    location.href="{{ route('contracts.index') }}"
                }

            </script>

 
@endsection