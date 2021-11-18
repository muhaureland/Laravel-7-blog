@extends('layout.master')
@section('title', 'Change Password')
@section('sub-judul', 'Change Password User')

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success mb-1">
                        {{ session('status') }}
                    </div>
                    @elseif (session('status2'))
                    <div class="alert alert-danger mb-1">
                        {{ session('status2') }}
                    </div>
                @endif

            <form action="{{ route('user.passwordupdate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="tag">Password lama</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="tag" name="current_password" autocomplete="new-password" placeholder="masukkan password">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Password baru</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="tag" name="password"  autocomplete="new-password" placeholder="masukkan password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Confirm Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="tag" name="password_confirmation"  autocomplete="new-password" placeholder="ulangi password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary col-5">Changes Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
