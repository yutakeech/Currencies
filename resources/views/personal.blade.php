@extends('layout.app')

@section('title', 'Главная страница')

@section('content')
    @include('partials.header')
    @include("partials.currencies.form", ["currencies" => $currencies])
    @include("partials.currencies.result", ["target_data" => $target_data])
@endsection
