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
                            Role
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
                                    
                                     {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                        

                                        
                                        <div class="form-group">
                                            <label>Role</label>
<!--                                             {!! Form::select('name',['Administrator'=>'Administrator','Assistant Administrator'=>'Assistant Administrator','Staff'=>'Staff'], old('name') ,['class'=>'form-control']) !!}
 -->
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                            </div>                                         

                                        <div class="form-group">
                                            <label>Permissions</label>
                                            <table class="table table-striped">
                                                <tbody>

                                            @foreach($roles as $role)
                                                    <tr>
                                                        <td>{{ $role }}</td>
                                                        <td>
                                                            <input type="checkbox" name="{{ $role }}[]" value="browse"> Browse
                                                            <input type="checkbox" name="{{ $role }}[]" value="read"> Read
                                                            <input type="checkbox" name="{{ $role }}[]" value="edit"> Edit
                                                            <input type="checkbox" name="{{ $role }}[]" value="add"> Add
                                                            <input type="checkbox" name="{{ $role }}[]" value="delete"> Delete
                                                        </td>
                                                    </tr>                                                    
                                            @endforeach
                                            </tbody>
                                            </table>
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
                    location.href="{{ route('roles.index') }}"
                }

               

            </script>

 
@endsection