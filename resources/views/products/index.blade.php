<x-app-layout>

<div class="container">

<h1>Producten</h1>

@auth
    <a href="{{ route('products.create') }}" class="btn">+ Nieuw Product</a>
    <br><br>
@endauth

@forelse($products as $product)

    <div class="card">
        <h2>
            <a href="{{ route('products.show', $product) }}" style="text-decoration:none; color:#333;">
                {{ $product->naam }}
            </a>
        </h2>

        <p class="price">€{{ number_format($product->prijs, 2) }}</p>

        <p>
            {{ \Illuminate\Support\Str::limit($product->beschrijving, 120) }}
        </p>

        <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">
            Bekijk product →
        </a>
    </div>

@empty
    <p>Er zijn nog geen producten beschikbaar.</p>
@endforelse

</div>

</x-app-layout>
