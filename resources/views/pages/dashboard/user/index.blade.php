@extends('layouts.dashboard')

@section('title')
    Users
@endsection

@section('content')
    <a type="button" class="btn btn-primary mb-5" href="{{ route('user.create') }}">Tambah</a>
    <div class="table-responsive">
        <table class="table table-bordered yajra-datatable " style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    {{-- <th>Password</th> --}}
                    <th>Role</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                fixedColumns: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'role',
                        name: 'role',
                        render: function (data, type, row) {
                            switch (data) {
                                case '1':
                                    return 'Super Admin';
                                    break;
                                case '2':
                                    return 'Admin';
                                    break;
                                default:
                                    return data;
                            }                     
                        }
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        orderable: true,
                        searchable: true,
                        class: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        class: 'text-center'
                    },
                ]
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.deleteUser', function() {
                var id = $(this).data('id');
                swal({
                    title: 'Anda Yakin?',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan lagi",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Hapus',
                            className: 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $.ajax({
                            type: "DELETE",
                            url: "user" + '/' + id,
                            dataType: 'json',
                            success: function(data) {
                                if (data.res == 'success') {
                                    swal({
                                        title: 'Terhapus',
                                        text: data.message,
                                        type: 'success',
                                        buttons: {
                                            confirm: {
                                                className: 'btn btn-success'
                                            }
                                        }
                                    });
                                    table.draw();
                                } else {
                                    swal({
                                        title: 'Gagal',
                                        text: 'Gagal Menghapus Data',
                                        type: 'danger',
                                        buttons: {
                                            confirm: {
                                                className: 'btn btn-success'
                                            }
                                        }
                                    });
                                }
                            },
                            error: function(data) {
                                swal({
                                    title: 'Gagal',
                                    text: 'Gagal Menghapus Data',
                                    type: 'danger',
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    }
                                });
                            }
                        });
                    } else {
                        swal.close();
                    }
                });

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#nav-users').addClass('active');
        })
    </script>
@endpush
