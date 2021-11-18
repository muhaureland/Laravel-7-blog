@extends('layout.master')
@section('title', 'User')
@section('sub-judul', 'Tambah User')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="tag">Nama User</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="tag" name="name" placeholder="masukkan nama user" autocomplete="off" value="{{ $user->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Email User</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="tag" name="email" placeholder="masukkan email user" autocomplete="off" value="{{ $user->email }}" readonly>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Role User</label>
                        <select class="form-control @error('user_role') is-invalid @enderror" name="user_role" id="category_id">
                                <option disabled selected>=== Pilih Role ===</option>
                                <option value="0" @if ($user->user_role === 0) selected @endif>Administrator</option>
                                <option value="1" @if ($user->user_role === 1) selected @endif>Penulis</option>
                        </select>
                        @error('user_role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary col-5">tambahkan User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
