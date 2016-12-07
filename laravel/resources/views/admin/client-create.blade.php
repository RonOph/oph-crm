@extends('layouts.admin')
 
@section('content')
 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Client Personal Information
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
                                    
                                     {{ Form::open(array('route' => 'clients.store','method'=>'POST')) }}
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="company_name"  placeholder="Enter Company Name" value="{{ old('company_name') }}"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Owner Name</label>
                                            <input class="form-control" name="owner_name"  placeholder="Enter Owner Name" value="{{ old('owner_name') }}"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" placeholder="Enter Owner's email" value="{{ old('email') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" name="contact_number" placeholder="Enter Contact Number" value="{{ old('contact_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Website</label>
                                            <input class="form-control" name="website_url" placeholder="Enter Website URL" value="{{ old('website_url') }}">
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="button" class="btn btn-default" onclick="Cancel()">Cancel</button>
                                        </div>
                                     {{ Form::close() }}
                                     
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