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
                                    
                                     {!! Form::model($role, ['method'=>'PATCH','route'=>['roles.update',$role->id]] ) !!}                                     

                                        <div class="form-group">
                                            <label>Name</label>
<!--                                             {!! Form::select('name',['Administrator'=>'Administrator','Assistant Administrator'=>'Assistant Administrator','Staff'=>'Staff'], $role->name ,['class'=>'form-control']) !!}-->
                                            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                        </div>                

                                        <div class="form-group">
                                            <label></label>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Menu</th>
                                                    <th>Permissions</th>
                                                </tr>
                                                <tbody>
                                            <?php $permissions = (array)json_decode($role->permissions); ?>
                                            @foreach($roles as $r)
                                                    <tr>
                                                        <td>{{ $r }}</td>
                                                        <td><?php $current_per = isset($permissions[$r]) ? $permissions[$r] : []; ?>
                                                            <input type="checkbox" <?=in_array('browse', $current_per) ? 'checked' : '' ?> name="{{ $r }}[]" value="browse"> Browse
                                                            <input type="checkbox" <?=in_array('read', $current_per) ? 'checked' : '' ?> name="{{ $r }}[]" value="read"> Read
                                                            <input type="checkbox" <?=in_array('edit', $current_per) ? 'checked' : '' ?> name="{{ $r }}[]" value="edit"> Edit
                                                            <input type="checkbox" <?=in_array('add', $current_per) ? 'checked' : '' ?> name="{{ $r }}[]" value="add"> Add
                                                            <input type="checkbox" <?=in_array('delete', $current_per) ? 'checked' : '' ?> name="{{ $r }}[]" value="delete"> Delete
                                                        </td>
                                                    </tr>                                                    
                                            @endforeach
                                            </tbody>
                                            </table>
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
                    location.href="{{ route('roles.index') }}"
                }

               

            </script>

 
@endsection