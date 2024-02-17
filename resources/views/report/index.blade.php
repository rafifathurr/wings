@extends('layouts.main')
@section('content')
    @php
        use App\Helpers\NumberFormat;
        use App\Helpers\CurrentTimestamp;
    @endphp
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Report Checkout Submission</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="display table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="15%">
                                                    Transaction
                                                </th>
                                                <th>
                                                    User
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                                <th width="15%">
                                                    Date
                                                </th>
                                                <th width="30%">
                                                    Item
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $report)
                                                <tr>
                                                    <td>
                                                        {{ $report['document_code'] }} - {{ $report['document_number'] }}
                                                    </td>
                                                    <td>
                                                        {{ $report['user']['user'] }}
                                                    </td>
                                                    <td align="right">
                                                        Rp. {{ NumberFormat::numberCurrencyFormat($report['total']) }},-
                                                    </td>
                                                    <td align="center">
                                                        {{ CurrentTimestamp::convertDate($report['date']) }}
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($report['transaction_detail'] as $report_detail)
                                                                <li>{{ $report_detail['product']['product_name'] }} x
                                                                    {{ $report_detail['quantity'] }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('javascript-bottom')
        <script>
            $('table').DataTable({
                pageLength: 10,
                paging: true,
                searching: true,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        </script>
    @endpush
@endsection
