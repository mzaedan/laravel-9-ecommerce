<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Product</title>
</head>
<body>
    @foreach ($products as $product)
        <p>Name : {{$product->name }}</p>
        <p>Description : {{$product->description }}</p>
        <p>Name : {{$product->price }}</p>
        <p>Name : {{$product->stock }}</p>
        <img src="{{ url('storage/'. $product->image) }}" height="100px">
    @endforeach
</body>
</html>