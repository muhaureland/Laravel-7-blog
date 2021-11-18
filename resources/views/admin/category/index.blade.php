@extends('layout.master')
@section('title', 'Category')
@section('sub-judul', 'Kategori')
@section('content')
    <div class="">
        <div class="row justify-content-end">
            <a href="{{ route('category.create') }}" class="btn btn-info mb-3 col-3">Tambah data</a>
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
                    <th scope="col">name</th>
                    <th scope="col-xs-1 center-block">aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $ctr => $hasil)
                <tr>
                    <th scope="row">{{ $ctr + $category->firstitem() }}</th>
                    <td>{{ $hasil->name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $hasil->id) }}" class="badge badge-success">edit</a>
                        <a href="" class="badge badge-info">Detail</a>
                        <form method="post" action="{{ route('category.destroy', $hasil->id) }}" class="d-inline">
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
        {{ $category->links() }}
    </div>
@endsection
