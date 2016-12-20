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
                           User
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
                                    
                                     {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                                        

                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name"  placeholder="Enter name" value="{{ old('name') }}"> 
                                        </div>                                         

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"  placeholder="Enter email" value="{{ old('email') }}"> 
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label> 
                                            <input type='password' class="form-control" name="password" />
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label> 
                                            <input type='password' class="form-control" name="password_confirmation" />
                                        </div>

                                        <div class="form-group">
                                            <label>Role</label> 
                                            {!! Form::select('role_id',$roles, old('role_id') ,['class'=>'form-control']) !!}
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

             
            <script> 
                function Cancel(){
                    location.href="{{ route('users.index') }}"
                }
            </script>

 
@endsection