@extends('layouts.dashboard')

@section('title')
    Ubah Platform
@endsection

@section('content')
    <form action="{{ route('platformProjek.update', $platformProjek->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group @error('nama') has-error @enderror">
            <label for="errorInput">Nama</label>
            <input type="text" value="{{ $platformProjek->nama }}" class="form-control" name="nama"
                placeholder="Masukkan Nama" required>
            @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
    </form>
@endsection

@push('style')
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('#nav-projek').addClass('active');
            $('#nav-projek').addClass('submenu');
        })
    </script>
@endpush
