@extends('layouts.dashboard')

@section('title')
    Pengaturan
@endsection

@section('content')
    <form action="{{ route('pengaturan.update', $pengaturan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group @error('nama_website') has-error @enderror">
            <label for="errorInput">Nama Website</label>
            <input type="text" class="form-control" name="nama_website" placeholder="Masukkan Nama Website" required
                value="{{ old('nama') ? old('nama') : $pengaturan->nama_website }}">
            @error('nama_website')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('slogan') has-error @enderror">
            <label for="exampleFormControlTextarea1">Slogan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="slogan"
                required>{{ old('slogan') ? old('slogan') : $pengaturan->slogan }}</textarea>
            @error('slogan')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('kontak') has-error @enderror">
            <label for="errorInput">Kontak</label>
            <input type="text" class="form-control" name="kontak" placeholder="Masukkan Kontak" required
                value="{{ old('kontak') ? old('kontak') : $pengaturan->kontak }}">
            @error('kontak')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('email') has-error @enderror">
            <label for="errorInput">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Masukkan Email" required
                value="{{ old('email') ? old('email') : $pengaturan->email }}">
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('logo') has-error @enderror">
            <label for="errorInput">Logo</label>
            <div id='img_contain'><img id="blah" align='middle' src="/assets/welcome/img/{{ $pengaturan->logo }}" alt=""
                    title='' /></div>
            <div class="input-group mt-2">
                <div class="custom-file">
                    <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                        aria-describedby="inputGroupFileAddon01" name="logo">
                    <label class="custom-file-label" for="inputGroupFile01">Ubah Foto</label>
                </div>
            </div>
            <small class="form-text text-muted">Ukuran Logo Harus Dibawah 500kb dan Berekstensi .PNG</small>
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
            $('#nav-pengaturan').addClass('active');
        })
    </script>
@endpush
