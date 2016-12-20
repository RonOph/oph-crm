@extends('layouts.admin')

@section('content')

@if($message = Session::get('success'))
<div class="row">
    <br/>
    <div class="alert-success">
        <p>{{ $message }}</p>
    </div>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                
                 <div class="row">  
                        <a href="{{ route('users.create') }}" class="btn btn-default">Add New</a>
                 </div>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                   

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr> 
                                    <th class="text-center">User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>                                    
                                    <th>Role</th>
                                    <th>Date Added</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                               
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td class="text-center">{{ sprintf('%04d',$user->id) }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>                                            
                                            <td>{{ $user->role->name }}</td>
                                            <td>{{ $user->created_at }}</td>                                            
                                            <td>                                                
                                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>   
                                                {{ Form::open(['method'=>'DELETE','route'=>['users.destroy',$user->id],'style'=>'display:inline;']) }}
                                                {{ Form::submit('Delete',['class'=>'btn btn-danger del']) }}
                                                {{ Form::close() }} 
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                        <tr> 
                                            <td class="center" colspan="6">No result found</td>
                                        </tr>
                                @endif                            
                            </tbody>
                        </table>

                        {{ $users->render() }}
                    </div>


                </div>
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<script type="text/javascript">
    $(document).ready(function(){

        $('.del').on('click',function(){
            if(confirm('Are you sure you want to delete?')){
                return true;
            }
            return false
        })
    })
</script>
@endsection
