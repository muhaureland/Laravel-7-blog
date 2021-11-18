@extends('layout.master')
@section('title', 'Post')
@section('sub-judul', 'edit Post')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="category">Judul</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="category" name="judul" placeholder="masukkan psot"  value="{{ $post->judul }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Kategory</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" placeholder="masukkan kategori">
                                <option disabled selected>=== Pilih Kategori ===</option>
                            @foreach($Rcategory as $result)
                                <option value="{{ $result->id }}"
                                    @if ($post->category_id == $result->id)
                                        selected
                                    @endif
                                    >{{ $result->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label>Pilih Tag</label>
                      <select class="form-control select2" multiple="" name="initag[]">
                        @foreach ($Rtag as $result)
                            <option value="{{ $result->id }}"
                                @foreach ($post->hubungkanKeTag as $wew)
                                    @if ($result->id == $wew->id)
                                        selected
                                    @endif
                                @endforeach
                                >{{ $result->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="editor">content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor" placeholder="masukkan cerita anda">{{ $post->content }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="category">Gambar</label>
                                <img src="{{ asset( $post->gambar ) }}" class="img-thumbnail">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror mt-5" id="category" name="gambar" placeholder="masukkan gambar">
                                    @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary col-5 mt-3">edit data</button>
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
