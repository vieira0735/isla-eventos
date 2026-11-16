@extends('layouts.app')

@section('titulo', 'Início')

@section('conteudo')
    <h1>{{ config('app.name') }}</h1>
    <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
    <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>

    <h2>Próximos eventos</h2>
    <ul>
        @forelse ($proximos as $evento)
            <li>
                <a href="{{ route('eventos.show', $evento['id']) }}">{{ $evento['titulo'] }}</a>
                · {{ date('d/m/Y', strtotime($evento['data'])) }}
            </li>
        @empty
            <li>Ainda não há eventos marcados.</li>
        @endforelse
    </ul>
@endsection