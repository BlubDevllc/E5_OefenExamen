<x-app-layout>

<div class="product-detail">

    <h1>{{ $product->naam }}</h1>

    <p class="price">€{{ number_format($product->prijs, 2) }}</p>

    <p>{{ $product->beschrijving }}</p>

    <div class="product-meta">
        Maker: {{ $product->maker->username ?? 'Onbekend' }}
    </div>

    <br>

    @if(auth()->check() && auth()->id() === $product->maker_id)
        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">
            Bewerken
        </a>

        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Verwijderen</button>
        </form>
    @endif

</div>

</x-app-layout>
