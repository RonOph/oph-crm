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
        <h1 class="page-header">Projects</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                
                 <div class="row">  
                        <a href="{{ route('projects.create') }}" class="btn btn-default">Add New</a>
                 </div>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                   

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr> 
                                    <th class="text-center">Project ID</th>
                                    <th class="text-center">Contract ID</th>
                                    <th>Name</th>                                   
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($projects) > 0)
                               
                                    @foreach($projects as $key => $project)
                                        <tr>
                                            <th class="text-center">Project ID</th>
                                            <th class="text-center">Contract ID</th>
                                            <th>Name</th>                                   
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Status</th>                                            
                                            <td>                                                
                                                <a class="btn btn-success" href="{{ route('projects.show', $project->id) }}">View</a>
                                                <a class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}">Edit</a>   
                                                {{ Form::open(['method'=>'DELETE','route'=>['projects.destroy',$project->id],'style'=>'display:inline;']) }}
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

                        {{ $projects->render() }}
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
