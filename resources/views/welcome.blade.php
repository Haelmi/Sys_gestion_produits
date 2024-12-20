<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PMS</title>
    <!-- Lien vers le fichier CSS -->
    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    
</head>
<body>
    <nav>
        <div class="navbar">
            <a href="{{route('products.get_all_products')}}">Products</a>
            <a href="{{route('categories.get_all_categories')}}">Categories</a>
        </div>
    </nav>
    <h1>Welcome to your <br>Product Management System</h1>
</body>
</html>
