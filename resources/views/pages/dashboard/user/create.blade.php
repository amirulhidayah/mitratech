@extends('layouts.dashboard')

@section('title')
    Tambah User
@endsection

@section('content')
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group @error('name') has-error @enderror">
            <label for="errorInput">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Masukkan name" required value="{{ old('name') }}">
            @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('email') has-error @enderror">
            <label for="errorInput">Email</label>
            <input type="email" class="form-control" name="email" required
                placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('username') has-error @enderror">
            <label for="errorInput">Username</label>
            <input type="text" class="form-control" name="username" required
                placeholder="Masukkan username" value="{{ old('username') }}">
            @error('username')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <label for="errorInput">Password</label>
            <input type="text" class="form-control" name="password" required
                placeholder="Masukkan password" value="{{ old('password') }}">
            @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('foto') has-error @enderror">
            <label for="errorInput">Foto</label>
            <div id='img_contain'><img id="blah" align='middle' src="/assets/dashboard/img/empty-picture.png" alt=""
                    title='' /></div>
            <div class="input-group mt-2">
                <div class="custom-file">
                    <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                        aria-describedby="inputGroupFileAddon01" name="foto" required value="{{ old('foto') }}">
                    <label class="custom-file-label" for="inputGroupFile01">Tambah Foto</label>
                </div>
            </div>
            <small class="form-text text-muted">Ukuran Foto Harus Dibawah 500kb</small>
            @error('foto')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group @error('role') has-error @enderror">
            <label for="errorInput">Role</label>
            <select class="custom-select mb-3" name="role" required>
                <option selected value="">- Pilih Role -</option>
                <option value="1" @if (old('role') == "1") {{ 'selected' }} @endif>Super Admin</option>
                <option value="2" @if (old('role') == "2") {{ 'selected' }} @endif>Admin</option>                
            </select>
            @error('role')
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
            $('#nav-tim').addClass('active');
        })
    </script>
@endpush
