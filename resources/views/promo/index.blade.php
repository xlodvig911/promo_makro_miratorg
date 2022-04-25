@extends('layouts.promo')

@section('content')
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-4 col-8 bg-white form_block px-3 py-4 rounded">
            <form action="{{route('promo.store')}}" method="post" class="mb-3">
                @csrf
                <div class="form-group mb-2">
                    <label for="promo_user_name">Ваше имя:</label>
                    <input type="text" name="promo_user_name"
                           class="form-control @error('promo_user_name') is-invalid @enderror"
                           id="promo_user_name"
                           placeholder="Аваз Азизов" value="{{ old('promo_user_name') }}">
                    @error('promo_user_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="promo_user_phone_number">Номер: +998</label>
                    <input type="text"
                           class="form-control @error('promo_user_phone_number') is-invalid @enderror"
                           name="promo_user_phone_number" id="promo_user_phone_number"
                           placeholder="(97) 123-45-67" value="{{ old('promo_user_phone_number') }}">
                    @error('promo_user_phone_number')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="promo_user_region">Укажите ваш регион:</label>
                    <select class="form-select w-100" id="promo_user_region"
                            aria-label="Выберите свой регион" name="promo_user_region">
                        <option selected disabled>Регионы</option>
                        @foreach($regions as $region)
                            <option value="{{$region->id}}"
                                    class="@error('promo_user_region') is-invalid @enderror">{{$region->name}}</option>
                        @endforeach
                    </select>
                    @error('promo_user_region')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="promo_code">Промокод</label>
                    <input type="text"
                           class="form-control @error('promo_code') is-invalid @enderror"
                           name="promo_code" id="promo_code"
                           placeholder="479*********" value="{{ old('promo_code') }}">
                    @error('promo_code')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-bg btn w-100">Стать участником</button>
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
    <script>
        let promo_code = document.getElementById("promo_code")
        document.querySelector('#promo_code').addEventListener('input',
            function (e) {
                this.value = this.value.replace(/[^\d]/g, '');
            }
        )
    </script>
@endsection
@section('style')

@endsection

