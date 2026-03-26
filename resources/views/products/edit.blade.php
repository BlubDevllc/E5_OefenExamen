<x-app-layout>

<div class="card">

    <h1>Product Bewerken</h1>

    @if ($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <label>Naam</label>
        <input type="text" name="naam" value="{{ old('naam', $product->naam) }}">

        <label>Beschrijving</label>
        <textarea name="beschrijving">{{ old('beschrijving', $product->beschrijving) }}</textarea>

        <label>Prijs (€)</label>
        <input type="number" step="0.01" name="prijs" value="{{ old('prijs', $product->prijs) }}">

        <button type="submit" class="btn">Opslaan</button>
        <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">Terug</a>
    </form>

</div>

</x-app-layout>
