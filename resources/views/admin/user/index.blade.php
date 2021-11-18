@extends('layout.master')
@section('title', 'User')
@section('sub-judul', 'User')


@section('content')
<form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('tag.index') }}">
	<input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<div class="">
    <div class="row justify-content-end">
        <a href="{{ route('user.create') }}" class="btn btn-info mb-3 col-3">Tambah user data</a>
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
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col-xs-1 center-block">aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $ctr => $hasil)
            <tr>
                <th scope="row">{{ $ctr + $user->firstitem() }}</th>
                <td>{{ $hasil->name }}</td>
                <td>{{ $hasil->email }}</td>
                <td>
                    @if ($hasil->user_role === 0)
                        Administrator
                        @elseif ($hasil->user_role === 1)
                        penulis
                    @endif
                </td>
                <td>
                    <a href="{{ route('user.edit', $hasil->id) }}" class="badge badge-success">edit</a>
                    <a href="" class="badge badge-info">Detail</a>
                    <form method="post" action="{{ route('user.destroy', $hasil->id) }}" class="d-inline">
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
    {{ $user->links() }}
</div>
@endsection
