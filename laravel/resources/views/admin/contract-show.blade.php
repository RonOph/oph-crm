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
                                        <label>Client :</label>
                                        {{ $credential->client->company_name }}
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Credential Type :</label>
                                        {{ $credential->type }}
                                         
                                    </div>
                                 
                                    <div class="form-group">
                                        <label>Link :</label>
                                        {{ $credential->link }}
                                    </div>
                                    <div class="form-group">
                                        <label>Username :</label>
                                        {{ $credential->username }}
                                    </div>
                                    <div class="form-group">
                                        <label>Password :</label>
                                        {{ $credential->password }}
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
                    location.href="{{ route('credentials.index') }}"
                }

            </script>

 
@endsection