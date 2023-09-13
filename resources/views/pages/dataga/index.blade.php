@extends('layouts.app')

@section('content')
@push('style')
<link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
<div class="row">
    <div class="col-12">
        <div class="card">
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
<script src="{{ asset('vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
@endpush
@push('custom')
<script type="text/javascript">
    $(function() {

                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "{{ route('glaze.index') }}",
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

            });
</script>
@endpush
@endsection