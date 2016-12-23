@extends('layouts.admin')
 
@section('content')


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
</div>

 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Client View
                        </div>
                        <div class="panel-body">
 
            
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr> 
                                                <td colspan="2" class="text-center"> <img src="{{ asset('images/'.$client->logo) }}"></td>
                                            </tr>
                                            <tr>
                                                <th>Company Name</th>
                                                <td>{{ $client->company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Owner Name</th>
                                                <td>{{ $client->owner_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $client->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile No.</th>
                                                <td>{{ $client->mobile_number }}/td>
                                            </tr> 
                                            <tr>
                                                <th>Telephone No.</th>
                                                <td>{{ $client->telephone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Website</th>
                                                <td>{{ $client->website_url }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th> 
                                                <td>{{ ucwords($client->status) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Note</th> 
                                                <td>{{ $client->note }}</td>
                                            </tr>
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
            <script type="text/javascript">
                function Cancel(){
                    location.href="{{ route('clients.index') }}"
                }

            </script>

 
@endsection