@extends('layout.master')
@section('title', 'Tag Edit')
@section('sub-judul', 'Edit tag')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('tag.update', $tag->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="category">Tag</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="category" name="name" placeholder="masukkan kategori"  value="{{ $tag->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary col-5">edit data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
