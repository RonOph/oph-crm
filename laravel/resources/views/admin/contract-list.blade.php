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
        <h1 class="page-header">Contracts</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                
                 <div class="row">  
                        <a href="{{ route('contracts.create') }}" class="btn btn-default">Add New</a>
                 </div>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                   

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr> 
                                    <th class="text-center">Contract ID</th>
                                    <th>Client</th>
                                    <th>Name</th>
                                    <th>Date Signed</th>
                                    <th>Start Date</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($contracts) > 0)
                               
                                    @foreach($contracts as $key => $contract)
                                        <tr>
                                            <td class="text-center">{{ $contract->official_contract_id }}</td>
                                            <td>{{ $contract->client->company_name }}</td>
                                            <td>{{ $contract->name }}</td>
                                            <td>{{ $contract->date_signed }}</td>
                                            <td>{{ $contract->start_date }}</td>                                            
                                            <td>                                                
                                                <a class="btn btn-success" href="{{ route('contracts.show', $contract->id) }}">View</a>
                                                <a class="btn btn-primary" href="{{ route('contracts.edit', $contract->id) }}">Edit</a>   
                                                {{ Form::open(['method'=>'DELETE','route'=>['contracts.destroy',$contract->id],'style'=>'display:inline;']) }}
                                                {{ Form::submit('Delete',['class'=>'btn btn-danger del']) }}
                                                {{ Form::close() }} 
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                        <tr> 
                                            <td class="center" colspan="7">No result found</td>
                                        </tr>
                                @endif                            
                            </tbody>
                        </table>

                        {{ $contracts->render() }}
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
