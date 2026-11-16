@extends('layouts.app')

@section('titulo', 'Início')

@section('conteudo')
    <h1>{{ config('app.name') }}</h1>
    <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
    <p><a href="{{ route('eventos.index') }}" class="botao">Ver eventos</a></p>

    <h2>Próximos eventos</h2>
    <div class="grelha">
        @forelse ($proximos as $evento)
            <x-cartao-evento :evento="$evento" />
        @empty
            <x-alerta>Ainda não há eventos marcados.</x-alerta>
        @endforelse
    </div>

    <h2>Eventos por tipo</h2>
    <ul>
        @foreach ($tipos as $t)
            <li><a href="{{ route('tipos.show', $t) }}">{{ $t->nome }}</a>: {{ $t->eventos_count }}</li>
        @endforeach
    </ul>
@endsection