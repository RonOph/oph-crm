@extends('layouts.admin')
 
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contract View
                        </div>
                        <div class="panel-body"> 
            
                            <div class="row">
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Contract ID</th>
                                                <td>{{ $contract->official_contract_id }}</td>
                                            </tr>

                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $contract->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date Signed</th>
                                                <td>{{ date('F d, Y',strtotime($contract->date_signed))}}</td>
                                            </tr>
                                            <tr>
                                                <th>Start Date</th>
                                                <td>{{ date('F d, Y',strtotime($contract->start_date)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>End Date</th>
                                                <td>{{ date('F d, Y',strtotime($contract->end_date)) }}</td>
                                            </tr>

                                            <tr>
                                                <th>Total Amount</th>
                                                <td>{{ number_format($contract->amount,2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Collection Schedule</th>
                                                <td>{{ $contract->collection_schedule }}</td>
                                            </tr>
                                            <tr>
                                                <th>Client's Company Name</th>
                                                <td>{{ $contract->client->company_name }}</td>
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
                    location.href="{{ route('contracts.index') }}"
                }

            </script>

 
@endsection