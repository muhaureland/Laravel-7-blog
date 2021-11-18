@extends('layout.master')
@section('title', 'Tag')
@section('sub-judul', 'Tambah Tag')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('tag.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="tag" name="name" placeholder="masukkan kategori" autocomplete="off" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary col-5">tambahkan tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
