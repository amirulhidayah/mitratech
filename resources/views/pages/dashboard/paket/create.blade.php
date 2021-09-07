@extends('layouts.dashboard')

@section('title')
Tambah Paket
@endsection

@section('content')
<form action="{{ route('paket.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group @error('nama') has-error @enderror">
        <label for="errorInput">Nama</label>
        <input type="text" value="{{ old('nama') }}" class="form-control" name="nama" placeholder="Masukkan Nama"
            required>
        @error('nama')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group @error('harga') has-error @enderror">
        <label for="errorInput">Harga</label>
        <input type="text" value="{{ old('harga') }}" class="form-control" name="harga" placeholder="Masukkan Harga"
            required>
        @error('harga')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group @error('fitur') has-error @enderror">
        <label for="errorInput">Fitur</label>
        <div class="row">
            <div class="col-lg-10">
                <input type="text" value="" class="form-control" placeholder="Masukkan Fitur" id="formFitur">
            </div>
            <button type="button" class="btn btn-warning float-right col-lg-2" id="btnTambahFitur">Tambah</button>
        </div>
        @error('fitur')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group" id="fitur">
        @if (old('fitur'))
        @for ($i = 0;$i < count(old('fitur'));$i++) <div class="row my-2" id="daftarFitur{{ ($i+1) }}"><input
                type="text" value="{{old('fitur.' . $i)}}" class="form-control" name="fitur[]"
                placeholder="Masukkan Fitur" hidden>
            <div class="col-lg-11">
                <p>{{old('fitur.' . $i)}}</p>
            </div><button type="button" class="btn btn-danger float-right col-lg-1 btnHapusFitur"
                id="{{ ($i+1) }}">X</button>
    </div>
    @endfor
    @endif
    </div>

    <div class="form-group @error('urutan') has-error @enderror">
        <label for="errorInput">Urutan</label>
        <input type="number" value="{{ old('urutan') }}" class="form-control" name="urutan"
            placeholder="Masukkan Urutan" required>
        @error('urutan')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </div>
</form>
@endsection

@push('style')
<style>
    #blah {
        max-height: 256px;
        height: auto;
        width: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding: 5px;
    }

    #img_contain {
        border-radius: 5px;
        /*  border:1px solid grey;*/
        margin-top: 20px;
        width: auto;
    }

    .alert {
        text-align: center;
    }

    .loading {
        animation: blinkingText ease 2.5s infinite;
    }

    @keyframes blinkingText {
        0% {
            color: #000;
        }

        50% {
            color: #transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #000;
        }
    }

    .custom-file-label {
        cursor: pointer;
    }
</style>
@endpush

@push('script')
<script>
    $("#inputGroupFile01").change(function (event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#inputGroupFile01").on('click', function (event) {
        RecurFadeIn();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                debugger;
                $('#blah').attr('src', e.target.result);
                $('#blah').hide();
                $('#blah').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }

    function RecurFadeIn() {
        console.log('ran');
        FadeInAlert("Wait for it...");
    }

    function FadeInAlert(text) {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");
    }

</script>
<script>
    var i = @php
    if (old('fitur')) {
        echo(count(old('fitur')));
    } else {
        echo(0);
    }
    @endphp;
    $('#btnTambahFitur').on('click', function () {
        var formFitur = $("#formFitur").val();
        if (!formFitur) {
            swal({
                title: 'Terjadi Kesalahan',
                text: 'Fitur Tidak Boleh Kosong',
                icon: 'warning',
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                }
            });
        } else {
            i++;
            var fitur = '<div class="row my-2" id="daftarFitur' + i + '"><input type="text" value="' +
                formFitur +
                '" class="form-control" name="fitur[]" placeholder="Masukkan Fitur"hidden><div class="col-lg-11"><p>' +
                formFitur +
                '</p></div><button type="button" class="btn btn-danger float-right col-lg-1 btnHapusFitur" id="' +
                i +
                '">X</button></div>';
            $('#fitur').append(fitur);
            $("#formFitur").val('');
        }
    })

    $(document).on('click', '.btnHapusFitur', function () {
        var id = $(this).attr("id");
        $('#daftarFitur' + id).remove();
        i--;
    })

    $(document).ready(function () {
        $('#nav-paket').addClass('active');
    })

</script>
@endpush
