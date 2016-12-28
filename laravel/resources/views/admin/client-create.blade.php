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
                                    
                                     {!! Form::open(array('route' => 'clients.store','method'=>'POST','files'=>'true')) !!}

                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input class="form-control" name="logo" type="file"> 
                                        </div>

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
                                            <label>Mobile Number</label>
                                            <input class="form-control" name="mobile_number" placeholder="Enter Mobile Number" value="{{ old('mobile_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Telephone Number</label>
                                            <input class="form-control" name="telephone_number" placeholder="Enter Telephone Number" value="{{ old('telephone_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Website</label>
                                            <input class="form-control" name="website_url" placeholder="Enter Website URL" value="{{ old('website_url') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Contract Status</label>
                                             {!! Form::select('status',[''=>'','pending'=>'Pending','active'=>'Active','inactive'=>'Inactive'], old('status') ,['class'=>'form-control']) !!}


                                        </div>

                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control" rows="3" name="note">{{ old('note') }}</textarea>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
            <script type="text/javascript">
                function Cancel(){
                    location.href="{{ route('clients.index') }}"
                }

            </script>

 
@endsection