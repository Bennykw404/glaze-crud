@extends('layouts.app')

@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
            integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Karyawan</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="table-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table-striped dataTable no-footer yajra-datatable table" id="table_user"
                                        role="grid" aria-describedby="table-1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc text-center" tabindex="0" aria-controls="table-1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="No : activate to sort column descending"
                                                    style="width: 10%;">
                                                    No
                                                </th>
                                                <th class="sorting text-center" rowspan="1" colspan="1"
                                                    aria-label="Nama : activate to sort column ascending"
                                                    style="width: 25%;">Nama</th>
                                                <th class="sorting text-center" rowspan="1" colspan="1"
                                                    aria-label="Progress" style="width: 20%;">Username</th>
                                                <th class="sorting text-center" rowspan="1" colspan="1"
                                                    aria-label="Members" style="width: 20%;">Email</th>
                                                <th class="sorting text-center" rowspan="1" colspan="1"
                                                    aria-label="Members" style="width: 10%;">Role</th>
                                                <th class="sorting text-center" rowspan="1" colspan="1"
                                                    aria-label="Members" style="width: 15%;">Action</th>
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
    {{-- modal edit --}}
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input id="name" type="text" name="name" class="form-control"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input id="username" type="text" name="username" class="form-control"
                                                value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input id="email" type="email" name="email" class="form-control"
                                                value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input id="password" type="password" name="password" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{-- modal delete --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Jika menghapus Karyawan maka</b></p>
                    <p>*data Karyawan tersebut hilang selamanya, apakah anda yakin?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                        Data</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
            integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
            integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    @endpush
    @push('custom')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
            $(document).ready(function() {
                $('#table_user').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "{{ route('user.index') }}",
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
                            data: "username"
                        },
                        {
                            data: "email"
                        },
                        {
                            data: "type"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                })
            })

            if ($("#form-tambah-edit").length > 0) {
                $("#form-tambah-edit").validate({
                    submitHandler: function(form) {
                        var actionType = $('#tombol-simpan').val();
                        $('#tombol-simpan').html('Sending..');
                        $.ajax({
                            data: $('#form-tambah-edit')
                                .serialize(),
                            url: "{{ route('user.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                $('#form-tambah-edit').trigger("reset");
                                $('#tambah-edit-modal').modal('hide');
                                $('#tombol-simpan').html('Simpan');
                                var oTable = $('#table_user')
                                    .dataTable();
                                oTable.fnDraw(false);
                                iziToast.success({
                                    title: 'Data Berhasil Disimpan',
                                    message: '{{ Session('success ') }}',
                                    position: 'bottomRight'
                                });
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $('#tombol-simpan').html('Simpan');
                            }
                        });
                    }
                })
            }

            $('body').on('click', '.edit-user', function() {
                var data_id = $(this).data('id');
                $.get('user/' + data_id + '/edit', function(data) {
                    $('#modal-judul').html("Edit User");
                    $('#tombol-simpan').val("edit-user");
                    $('#tambah-edit-modal').modal('show');
                    //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#password').val(data.password);
                })
            });

            $(document).on('click', '.delete', function() {
                dataId = $(this).attr('id');
                $('#konfirmasi-modal').modal('show');
            });
            //jika tombol hapus pada modal konfirmasi di klik maka
            $('#tombol-hapus').click(function() {
                $.ajax({
                    url: "user/" + dataId,
                    type: 'delete',
                    beforeSend: function() {
                        $('#tombol-hapus').text('Hapus Data');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#konfirmasi-modal').modal('hide');
                            var oTable = $('#table_user').dataTable();
                            oTable.fnDraw(false);
                        });
                        iziToast.warning({
                            title: 'Data Berhasil Dihapus',
                            message: '{{ Session('delete ') }}',
                            position: 'bottomRight'
                        });
                    }
                })

            });
        </script>
    @endpush
@endsection
