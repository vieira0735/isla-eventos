@extends('layouts.app')

@section('titulo', 'Página não encontrada')

@section('conteudo')
    <h1>404 · Página não encontrada</h1>
    <p>A página que procuras não existe.</p>
    <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>
@endsection