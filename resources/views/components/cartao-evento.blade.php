@props(['evento'])

<article {{ $attributes->merge(['class' => 'cartao']) }}>
    <span class="etiqueta etiqueta-{{ $evento->tipo->slug }}">
        <a href="{{ route('tipos.show', $evento->tipo) }}">{{ $evento->tipo->nome }}</a>
    </span>
    <h3>
        <a href="{{ route('eventos.show', $evento) }}">{{ $evento->titulo }}</a>
    </h3>
    <p>{{ $evento->data->format('d/m/Y') }} · {{ $evento->local }}</p>
</article>