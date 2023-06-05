@extends('master')
@section('title', 'Inicio / Home')
@section('content')

<!-- banner -->
@include('home.secciones.banners')
<!-- formulario -->
@include('home.secciones.formulario')
<!-- mapa -->
@include('home.secciones.mapa')

@endsection
