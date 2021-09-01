@extends('layouts.dashboard')

@section('title')
    Edit Client
@endsection

@section('content')
    <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group @error('nama') has-error @enderror">
            <label for="errorInput">Nama</label>
            <input type="text" value="{{ $client->nama }}" class="form-control" name="nama" placeholder="Masukkan Nama">
            @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('logo') has-error @enderror">
            <label for="errorInput">Logo</label>
            <div id='img_contain'><img id="blah" align='middle' src="/assets/welcome/img/client/{{ $client->logo }}"
                    alt="" title='' /></div>
            <div class="input-group mt-2">
                <div class="custom-file">
                    <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                        aria-describedby="inputGroupFileAddon01" name="logo">
                    <label class="custom-file-label" for="inputGroupFile01">Tambah Logo</label>
                </div>
            </div>
            <small class="form-text text-muted">Ukuran Logo Harus Dibawah 500kb</small>
            @error('logo')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
        $("#inputGroupFile01").change(function(event) {
            RecurFadeIn();
            readURL(this);
        });
        $("#inputGroupFile01").on('click', function(event) {
            RecurFadeIn();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputGroupFile01").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
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
        $(document).ready(function() {
            $('#nav-client').addClass('active');
        })
    </script>
@endpush
