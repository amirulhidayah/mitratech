@extends('layouts.dashboard')

@section('title')
    Edit Cover
@endsection

@section('content')
    <form action="{{ route('cover.update', $cover->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group @error('cover') has-error @enderror">
            <label for="errorInput">Cover</label>
            <div id='img_contain'><img id="blah" align='middle' src="/assets/welcome/img/covers/{{ $cover->foto }}" alt=""
                    title='' /></div>
            <div class="input-group mt-2">
                <div class="custom-file">
                    <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                        aria-describedby="inputGroupFileAddon01" name="foto">
                    <label class="custom-file-label" for="inputGroupFile01">Edit Cover</label>
                </div>
            </div>
            <small class="form-text text-muted">Ukuran cover Harus Dibawah 500kb</small>
            @error('cover')
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
            $('#nav-cover').addClass('active');
        })
    </script>
@endpush
