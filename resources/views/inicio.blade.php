@section('conteudo')
    <h1>{{ config('app.name') }}</h1>
    <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
    <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>

    <h2>Próximos eventos</h2>
    <div class="grelha">
        @forelse ($proximos as $evento)
            <x-cartao-evento :evento="$evento" />
        @empty
            <x-alerta>Ainda não há eventos marcados.</x-alerta>
        @endforelse
    </div>
@endsection