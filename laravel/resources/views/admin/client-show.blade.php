@extends('layouts.admin')
 
@section('content')


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
</div>

 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Client Personal Information
                        </div>
                        <div class="panel-body">
 
            
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <img src="{{ asset('images/'.$client->logo) }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Company Name :</label>
                                             {{ $client->company_name }}
                                        </div>
                                        <div class="form-group">
                                            <label>Owner Name :</label>
                                             {{ $client->owner_name }}
                                        </div>
                                        <div class="form-group">
                                            <label>Email :</label>
                                              {{ $client->email }}
                                        </div>

                                        <div class="form-group">
                                            <label>Mobile No. :</label>
                                              {{ $client->mobile_number }}
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone No. :</label>
                                              {{ $client->telephone_number }}
                                        </div> 

                                        <div class="form-group">
                                            <label>Website :</label>
                                              {{ $client->website_url }}
                                        </div>
                                        <div class="form-group">
                                            <label>Status :</label>
                                              {{ ucwords($client->status) }}
                                        </div>
                                        <div class="form-group">
                                            <label>Note :</label>
                                              {{ $client->note }}
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
                    location.href="{{ route('clients.index') }}"
                }

            </script>

 
@endsection