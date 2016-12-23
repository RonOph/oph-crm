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
 
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
  
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Role</th>
                                                        <td>{{ $role->name }}</td>
                                                    </tr>
                                                </tbody>  
                                            </table>              
 
                                            <table class="table table-bordered">
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
                                                                <?=in_array('browse', $current_per) ? '<i class="fa fa-check-square-o"> </i> Browse' : '' ?>
                                                                <?=in_array('read', $current_per) ? '<i class="fa fa-check-square-o"> </i> Read' : '' ?>
                                                                <?=in_array('edit', $current_per) ? '<i class="fa fa-check-square-o"> </i> Edit' : '' ?>
                                                                <?=in_array('add', $current_per) ? '<i class="fa fa-check-square-o "></i> Add' : '' ?>
                                                                <?=in_array('delete', $current_per) ? '<i class="fa fa-check-square-o"> </i> Delete' : '' ?>
                                                            </td>
                                                        </tr>                                                    
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <table>
                                                <tr>
                                                    <td><button type="button" class="btn btn-default" onclick="Cancel()">Back</button></td>
                                                </tr>
                                            </table>  
                                     
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