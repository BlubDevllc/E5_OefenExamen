<x-app-layout>

<div class="card">

    <h1>Nieuw Product</h1>

    @if ($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <label>Naam</label>
        <input type="text" name="naam" value="{{ old('naam') }}">

        <label>Beschrijving</label>
        <textarea name="beschrijving">{{ old('beschrijving') }}</textarea>

        <label>Prijs (€)</label>
        <input type="number" step="0.01" name="prijs" value="{{ old('prijs') }}">

        <button type="submit" class="btn">Product aanmaken</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>

</div>  

</x-app-layout>
