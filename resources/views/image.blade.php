<!-- In your product_show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image</title>
</head>
<body>
    <h1>Product image</h1>
    <img src="{{ asset('storage/' . $product->image) }}" style="max-width: 200px; height: auto;">
</body>
</html>
