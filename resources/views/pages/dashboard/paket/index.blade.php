@extends('layouts.dashboard')

@section('title')
Paket
@endsection

@section('content')
<a type="button" class="btn btn-primary mb-5" href="{{ route('paket.create') }}">Tambah</a>
<div class="table-responsive">
    <table class="table table-bordered yajra-datatable " style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Fitur</th>
                <th>Urutan</th>
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
                ajax: "{{ route('paket.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'fitur',
                        name: 'fitur'
                    },
                    {
                        data: 'urutan',
                        name: 'urutan'
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

            $('body').on('click', '.deletePaket', function() {
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
                            url: "paket" + '/' + id,
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
            $('#nav-paket').addClass('active');
        })
</script>
@endpush
