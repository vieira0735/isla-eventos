@extends('layouts.app')

@section('titulo', $tipo->nome)

@section('conteudo')
    <h1>{{ $tipo->nome }}</h1>

    <div class="grelha">
        @forelse ($eventos as $evento)
            <x-cartao-evento :evento="$evento" />
        @empty
            <x-alerta>Ainda não há eventos deste tipo.</x-alerta>
        @endforelse
    </div>

    <p><a href="{{ route('eventos.index') }}">Voltar aos eventos</a></p>
@endsection