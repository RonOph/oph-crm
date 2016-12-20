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
                                    
                                     {!! Form::model($user, ['method'=>'PATCH','route'=>['users.update',$user->id]] ) !!}                                     

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name"  placeholder="Enter name" value="{{ $user->name }}"> 
                                        </div>                                         

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"  placeholder="Enter email" value="{{ $user->email }}"> 
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
                                            {!! Form::select('role_id',$roles, $user->role_id ,['class'=>'form-control']) !!}
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
            <link rel="stylesheet" href="{{ URL::asset('dist/css/jquery-ui-v1.11.2.css') }}">
            <script src="{{ URL::asset('dist/js/jquery-ui-v1.11.2.js') }}"></script>

            <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 

              <script>
              $(function() {
                $( "#startdatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
                $( "#enddatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
              });
                function Cancel(){
                    location.href="{{ route('users.index') }}"
                }

               

            </script>

 
@endsection