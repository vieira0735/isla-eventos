@extends('layouts.app')

@section('titulo', $evento->titulo)

@section('conteudo')
    @if ($evento->inscritos >= $evento->vagas)
        <x-alerta tipo="aviso">Este evento está esgotado.</x-alerta>
    @endif

    <h1>{{ $evento->titulo }}</h1>
    <p>Tipo: <a href="{{ route('tipos.show', $evento->tipo) }}">{{ $evento->tipo->nome }}</a></p>
    <p>Data: {{ $evento->data->format('d/m/Y') }}</p>
    <p>Local: {{ $evento->local }}</p>
    <p>Inscritos: {{ $evento->inscritos }} de {{ $evento->vagas }}</p>
    @if ($evento->descricao)
        <p>{{ $evento->descricao }}</p>
    @endif
    <p><a href="{{ route('eventos.index') }}">Voltar aos eventos</a></p>
@endsection