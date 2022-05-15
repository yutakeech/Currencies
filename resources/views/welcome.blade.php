@extends('layout.app')

@section('title', 'Главная страница')

@section('content')
    @include('partials.header')

    Список доступных валют
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($currencies as $currency)
            @include("currencies.partials.item", ["currency" => $currency])
        @endforeach
    </div>
@endsection
