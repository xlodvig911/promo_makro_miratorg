@extends('layouts.promo')

@section('content')
    Админ панель!

    <form action="{{route('admin.logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="">
        Всего участников {{$count_promo_users}}
    </div>

    <div class="d-flex bg-white">
        <span class="">Победитель номер 3</span>
        <form action="{{route('admin.winner_3')}}" method="post" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-success">3 место</button>
        </form>
        @if(!empty($winner_3_data))
            {{$winner_3_data['name']}}
            {{$winner_3_data['region']}}
            {{$winner_3_data['promocode']}}
        @endif
    </div>

    <div class="d-flex bg-white">
        <span>Победитель номер 2</span>
        <form action="{{route('admin.winner_2')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">2 место</button>
        </form>
        @if(!empty($winner_2_data))
            {{$winner_2_data['name']}}
            {{$winner_2_data['region']}}
            {{$winner_2_data['promocode']}}
        @endif
    </div>

    <div class="d-flex bg-white">
        <span class="">Победитель номер 3</span>
        <form action="{{route('admin.winner_1')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">1 место</button>
        </form>
        @if(!empty($winner_1_data))
            {{$winner_1_data['name']}}
            {{$winner_1_data['region']}}
            {{$winner_1_data['promocode']}}
        @endif
    </div>


@endsection
