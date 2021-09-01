@extends('layouts.dashboard')

@section('title')
    Edit Projek
@endsection

@section('content')
    <form action="{{ route('projek.update', $projek->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group @error('isi') has-error @enderror">
                    <label for="errorInput">Isi</label>
                    <textarea name="isi" class="my-editor form-control" id="my-editor" cols="30" rows="10"
                        required>{{ $projek->isi }}</textarea>
                    @error('isi')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group @error('judul') has-error @enderror">
                    <label for="exampleFormControlTextarea1">Judul</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="judul"
                        required>{{ $projek->judul }}</textarea>
                    @error('judul')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group @error('deskripsi') has-error @enderror">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"
                        required>{{ $projek->deskripsi }}</textarea>
                    @error('deskripsi')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group @error('platform') has-error @enderror">
                    <label for="exampleFormControlSelect1">Platform</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="platform" required>
                        <option value="" hidden>Pilih Platform</option>
                        @foreach ($platformProjek as $platform)
                            @if ($platform->id == $projek->platform_projek_id)
                                <option value="{{ $platform->id }}" selected>{{ $platform->nama }}</option>
                            @else
                                <option value="{{ $platform->id }}">{{ $platform->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('platform')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group @error('foto') has-error @enderror">
                    <label for="errorInput">Foto</label>
                    <div id='img_contain'><img id="blah" align='middle'
                            src="/assets/welcome/img/projek/foto/{{ $projek->foto }}" alt="" title='' /></div>
                    <div class="input-group mt-2">
                        <div class="custom-file">
                            <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                                aria-describedby="inputGroupFileAddon01" name="foto">
                            <label class="custom-file-label" for="inputGroupFile01">Tambah Foto</label>
                        </div>
                    </div>
                    <small class="form-text text-muted">Ukuran Foto Harus Dibawah 500kb</small>
                    @error('foto')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

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
    <link rel="stylesheet" href="/assets/dashboard/css/trix.css">
@endpush

@push('script')
    <script src="/assets/dashboard/js/trix.js"></script>
    <script src="/assets/dashboard/js/attachment.js"></script>

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

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            height: 1000,
        };
    </script>

    <script>
        CKEDITOR.replace('my-editor', options);
    </script>

    <script>
        $(document).ready(function() {
            $('#nav-projek').addClass('active');
            $('#nav-projek').addClass('submenu');
        })
    </script>
@endpush
