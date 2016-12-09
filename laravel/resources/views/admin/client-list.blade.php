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
        <h1 class="page-header">Clients</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                
                 <div class="row">  
                        <a href="{{ route('clients.create') }}" class="btn btn-default">Add New</a>
                 </div>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                   

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Company Name</th>
                                    <th>Owner</th>
                                    <th>Email</th>
                                    <th>Contract Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($clients) > 0)
                               
                                    @foreach($clients as $key => $client)
                                        <tr>
                                            <td>{{ $client->logo }}</td>
                                            <td>{{ $client->company_name }}</td>
                                            <td>{{ $client->owner_name }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td class="center">{{ $client->contract_status }}</td>
                                             <td class="center">
                                                <a class="btn btn-success" href="{{ route('clients.show', $client->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('clients.edit', $client->id) }}">Edit</a>   
                                                {{ Form::open(['method'=>'DELETE','route'=>['clients.destroy',$client->id],'style'=>'display:inline;']) }}
                                                {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
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
@endsection
