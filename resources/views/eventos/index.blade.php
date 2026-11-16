@extends('layouts.app')

@section('titulo', 'Eventos')

@section('conteudo')
    <h1>Eventos @if ($tipo) ({{ $tipo }}) @endif</h1>

    <p>
        <a href="{{ route('eventos.index') }}">todos</a>
        @foreach ($tipos as $t)
            · <a href="{{ route('eventos.index', ['tipo' => $t->slug]) }}">{{ $t->nome }}</a>
        @endforeach
    </p>

    @if ($eventos->isEmpty())
        <x-alerta tipo="aviso">Não há eventos para mostrar.</x-alerta>
    @endif

    <table>
        <thead>
            <tr><th>#</th><th>Evento</th><th>Tipo</th><th>Data</th><th>Vagas livres</th></tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('eventos.show', $evento) }}">{{ $evento->titulo }}</a></td>
                    <td><a href="{{ route('tipos.show', $evento->tipo) }}">{{ $evento->tipo->nome }}</a></td>
                    <td>{{ $evento->data->format('d/m/Y') }}</td>
                    <td>
                        @if ($evento->inscritos >= $evento->vagas)
                            <strong>Esgotado</strong>
                        @else
                            {{ $evento->vagas - $evento->inscritos }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection