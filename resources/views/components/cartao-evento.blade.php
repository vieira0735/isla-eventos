@props(['evento'])

<article {{ $attributes->merge(['class' => 'cartao']) }}>
    <span class="etiqueta etiqueta-{{ $evento->tipo }}">{{ ucfirst($evento->tipo) }}</span>
    <h3>
        <a href="{{ route('eventos.show', $evento->id) }}">{{ $evento->titulo }}</a>
    </h3>
    <p>{{ $evento->data->format('d/m/Y') }} · {{ $evento->local }}</p>
</article>