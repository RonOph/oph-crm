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
        <h1 class="page-header">Credentials</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                
                 <div class="row">  
                        <a href="{{ route('credentials.create') }}" class="btn btn-default">Add New</a>
                 </div>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                   

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr> 
                                    <th>Client</th>
                                    <th>Type</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Link</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($credentials) > 0)
                               
                                    @foreach($credentials as $key => $credential)
                                        <tr>
                                            <td> {{ $credential->client->company_name }}</td>
                                            <td>{{ $credential->type }}</td>
                                            <td>{{ $credential->username }}</td>
                                            <td>{{ $credential->password }}</td>
                                            <td>{{ $credential->link }}</td>                                            
                                            <td>                                                
                                                <a class="btn btn-success" href="{{ route('credentials.show', $credential->id) }}">View</a>
                                                <a class="btn btn-primary" href="{{ route('credentials.edit', $credential->id) }}">Edit</a>   
                                                {{ Form::open(['method'=>'DELETE','route'=>['credentials.destroy',$credential->id],'style'=>'display:inline;']) }}
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

                        {{ $credentials->render() }}
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
