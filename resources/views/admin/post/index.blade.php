@extends('layout.master')
@section('title', 'Post')
@section('sub-judul', 'Post')
@section('content')
    <div class="">
        <div class="row justify-content-end">
            <a href="{{ route('post.create') }}" class="btn btn-info mb-3 col-3">Tambah data</a>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1">
                {{ session('status') }}
            </div>
         @endif
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama post</th>
                    <th scope="col">Kategory</th>
                    <th scope="col">Tag</th>
                    <th scope="col">User</th>
                    <th scope="col">gambar</th>
                    <th scope="col-xs-1 center-block">aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post as $ctr => $hasil)
                <tr>
                    <th scope="row">{{ $ctr + $post->firstitem() }}</th>
                    <td>{{ $hasil->judul }}</td>
                    <td>{{ $hasil->category->name }}</td>
                    <td>
                        <div class="form-group">
                            <select class="form-control mt-4">
                            @foreach($hasil->hubungkanKeTag as $wew)
                                <option>{{ $wew->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </td>
                    <td>{{ $hasil->user->name }}</td>
                    <td>
                        <img src="{{ asset( $hasil->gambar ) }}" class="card-img"  style="width: 5rem; height: 4rem;">
                    </td>
                    <td>
                        <a href="{{ route('post.edit', $hasil->id) }}" class="badge badge-success">edit</a>
                        <a href="" class="badge badge-info">Detail</a>
                        <form method="post" action="{{ route('post.destroy', $hasil->id) }}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="badge btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-md-center">
        {{ $post->links() }}
    </div>
@endsection
