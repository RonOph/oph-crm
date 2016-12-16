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
                            Credential
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
                                    
                                     {!! Form::open(array('route' => 'credentials.store','method'=>'POST')) !!}

                                     
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input class="form-control" name="link"  placeholder="Enter link" value="{{ old('link') }}"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username"  placeholder="Enter username" value="{{ old('username') }}"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Type</label>
                                            {!! Form::select('type',$types, old('type') ,['class'=>'form-control']) !!}
                                             
                                        </div>

                                        <div class="form-group">
                                            <label>Client</label> 
                                            {!! Form::select('client_id',$clients, old('client_id') ,['class'=>'form-control']) !!}
                                            
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
            <script type="text/javascript">
                function Cancel(){
                    location.href="{{ route('credentials.index') }}"
                }

            </script>

 
@endsection