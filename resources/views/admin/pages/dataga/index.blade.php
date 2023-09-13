@extends('layouts.app')

@section('content')
@push('style')
<link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.exportpdf') }}" class="btn btn-icon icon-left btn-primary mr-2">
                    <i class="far fa-file"></i> Export PDF
                </a>
                <a href="{{ route('admin.exportxlsx') }}" class="btn btn-icon icon-left btn-success">
                    <i class="far fa-file"></i> Export (.xlsx)
                </a>
                <a href="javascript:;" class="btn btn-primary daterange-btn icon-left btn-icon ml-2"><i
                        class="fas fa-calendar"></i>
                    Choose Date
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table-striped dataTable no-footer yajra-datatable table" id="table-1"
                                    role="grid" aria-describedby="table-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc text-center" tabindex="0" aria-controls="table-1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="No : activate to sort column descending" style="width: 5%;">
                                                No
                                            </th>
                                            <th class="sorting text-center" rowspan="1" colspan="1"
                                                aria-label="Nama : activate to sort column ascending"
                                                style="width: 15%;">Nama</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1"
                                                aria-label="Progress" style="width: 10%;">Created</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1" aria-label="Members"
                                                style="width: 10%;">Glaze/Engobe</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1" aria-label="Members"
                                                style="width: 10%;">Shift</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1" aria-label="Members"
                                                style="width: 10%;">Grub</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1"
                                                aria-label="Spra :y: activate to sort column ascending"
                                                style="width: 10%;">Spray</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1" aria-label="Members"
                                                style="width: 10%;">Density</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1"
                                                aria-label="Visc :osity: activate to sort column ascending"
                                                style="width: 10%;">Viscosity</th>
                                            <th class="sorting text-center" rowspan="1" colspan="1"
                                                aria-label="Weig :ht: activate to sort column ascending"
                                                style="width: 10%;">Weight</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
@endpush
@push('custom')
<script type="text/javascript">
    $(function() {

        $('.daterange-btn').daterangepicker({
        ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
        }, function (start, end) {
        $('#start_date').val(start.format('YYYY-MM-DD'));
        $('#end_date').val(end.format('YYYY-MM-DD'));
        $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        // Trigger DataTables reload
        $('.yajra-datatable').DataTable().ajax.reload();
        });

                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "{{ route('admin.data') }}",
                        "type": "GET"
                    },
                    "columnDefs": [{
                        "className": "text-center",
                        "targets": "_all"
                    }],
                    columns: [{
                            data: "DT_RowIndex"
                        },
                        {
                            data: "name"
                        },
                        {
                            data: "created_at",
                            render: function(value) {
                                if (value === null) return "";
                                return moment(value).format("DD/MM/YYYY HH:mm");
                            },
                        },
                        {
                            data: "dept"
                        },
                        {
                            data: "shift"
                        },
                        {
                            data: "grub"
                        },
                        {
                            data: "spray"
                        },
                        {
                            data: "density"
                        },
                        {
                            data: "viscosity"
                        },
                        {
                            data: "weight"
                        },
                    ]
                });
                $('#filter').on('click', function() {
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();

                table.columns(2).search(start_date + ' - ' + end_date).draw();
                });

            });
</script>
@endpush
@endsection