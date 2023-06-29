<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
    <p>Name : {{ $product->name }}</p>
    <p>Description : {{ $product->description }}</p>
    <p>Price :{{ $product->price }}</p>
    <p>Stock :{{ $product->stock }}</p>
    <img src="{{ url('storage'. $product->image) }}" height="100px">
        
</body>
</html>