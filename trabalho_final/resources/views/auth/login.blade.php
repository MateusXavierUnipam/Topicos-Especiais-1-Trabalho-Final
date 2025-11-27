@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header text-center bg-primary text-white">Login</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
                @if($errors->any())
                    <div class="alert alert-danger mt-3 py-2">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
            <div class="card-footer text-muted text-center" style="font-size: 0.8rem;">
                Use: admin@admin.com / 123456
            </div>
        </div>
    </div>
</div>
@endsection