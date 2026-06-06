<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $lang === 'fr' ? $product->name_fr : $product->name_en }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4" style="max-width:500px">

    {{-- Language switcher --}}
    <div class="text-end mb-3">
        <a href="?lang=en" class="btn btn-sm {{ $lang === 'en' ? 'btn-dark' : 'btn-outline-dark' }}">EN</a>
        <a href="?lang=fr" class="btn btn-sm {{ $lang === 'fr' ? 'btn-dark' : 'btn-outline-dark' }}">FR</a>
    </div>


    <p class="text-muted">{{ $product->company->name }}</p>


    <h2>{{ $lang === 'fr' ? $product->name_fr : $product->name_en }}</h2>


    <div lang="{{ $lang === 'fr' ? 'fr' : 'en' }}">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}"
                 class="img-fluid mb-3 d-block w-100">
        @else
            <img src="https://placehold.co/400x300"
                 class="img-fluid mb-3 d-block w-100">
        @endif


        <p><strong>GTIN:</strong> {{ $product->gtin }}</p>


        <p>{{ $lang === 'fr' ? $product->description_fr : $product->description_en }}</p>


        <p><strong>{{ $lang === 'fr' ? 'Poids' : 'Weight' }}:</strong>
            {{ $product->gross_weight }} {{ $product->weight_unit }}</p>

        <p><strong>{{ $lang === 'fr' ? 'Contenu net' : 'Net content weight' }}:</strong>
            {{ $product->net_weight }} {{ $product->weight_unit }}</p>
    </div>

</div>
</body>
</html>
