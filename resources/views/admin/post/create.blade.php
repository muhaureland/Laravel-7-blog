@extends('layout.master')
@section('title', 'Post')
@section('sub-judul', 'Tambah Post')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="category" name="judul" placeholder="masukkan psot" autocomplete="off" value="{{ old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Kategory</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                <option disabled selected>=== Pilih Kategori ===</option>
                            @foreach($category as $result)
                                <option value="{{ $result->id }}" {{ old('category_id') == $result->id ? 'selected' : '' }}>{{ $result->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label>Pilih Tag</label>
                      <select class="form-control select2" multiple="" name="initag[]">
                        @foreach ($tag as $result)
                            <option value="{{ $result->id }}">{{ $result->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="editor">content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor" autocomplete="off" placeholder="masukkan cerita anda">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Thumbnail</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="category" name="gambar" placeholder="masukkan psot">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary col-5">tambahkan data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection
