@extends('layout.app')

@section('title', 'Главная страница')

@section('content')
    @include('partials.header')
    <a href="{{ route("login") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Авторизуйтесь, чтобы посмотреть курс валют к рублю</a><br/>
    <div class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-3">Список доступных валют:</div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($currencies as $currency)
            @include("partials.currencies.item", ["currency" => $currency])
        @endforeach
    </div>
@endsection
