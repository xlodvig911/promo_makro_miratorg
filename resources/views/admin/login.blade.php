@extends('layouts.promo')

@section('content')
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-4 col-8 bg-white form_block px-3 py-4 rounded">
            <form action="{{route('admin.login_verify')}}" method="post" class="mb-3">
                @csrf
                <div class="form-group mb-2">
                    <label for="login">Логин:</label>
                    <input type="text" name="login"
                           class="form-control @error('login') is-invalid @enderror"
                           id="login"
                           placeholder="Введите ваш логин" value="{{ old('login') }}">
                    @error('login')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="password">Пароль</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" id="password"
                           placeholder="Введите ваш пароль">
                    @error('password')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-bg btn w-100">Войти</button>
            </form>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
    </div>
@endsection
@section('script')

@endsection

