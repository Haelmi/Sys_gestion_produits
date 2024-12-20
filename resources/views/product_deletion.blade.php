<!DOCTYPE html>
<html>
<head>
    <title>Product Deletion Form</title>
</head>
<body>
<form method="POST" action="{{ route('products.delete_product', $product->id) }}">
    @csrf
    @method('DELETE')  
    <button type="submit">Delete</button>
</form>

</body>
</html>