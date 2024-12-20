<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Product Update Form</title>
</head>
<body>
    <div class="prod_update_header">
        <a href="/api/products" class="home-icon">
          <i class="fas fa-home"></i>
        </a>  
        <h3>Update a product</h3>
    </div>
    <form method="POST" action="{{ route('products.update_product', $product->id) }}" enctype="multipart/form-data">
      <div class="prod_update_container">
        @csrf
        @method('PUT')
        <table class="product_update_form">
            <tr>
               <td><label for="name">Name :</label></td>
               <td> <input type="text" id="name" name="name" value="{{ $product->name }}"><br> </td>
            </tr>
            <tr>
                <td><label for="description">Description :</label></td>
                <td><input type="text" id="description" name="description" value="{{ $product->description }}"><br></td>
            </tr>
            <tr>
                <td><label for="price">Price :</label></td>
                <td><input type="number" name="price" id="price" min="0" step="0.01"  value="{{ $product->price }}" required><br></td>
            </tr>
            <tr>
                <td><label for="category">Category:</label></td>
                <td><select name="category_id" id="category" required>
                        <option value="">-- Select an Option --</option>
                        @foreach ($Categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>  <br>
                </td>
            </tr>

            @if ($product->image)
            <tr>
                <td><p>Current Image:</p></td>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" style="max-width: 200px; height: auto;"><br></td>
            </tr>
            @endif

            <tr>
                <td><label for="image">Upload New Image (optional):</label></td>
                <td><input type="file" name="image" id="image" accept="image/*"><br></td>
            </tr>
        </table>

        <button type="submit" class="prod_update_submit" id="prod_update_btn">Update Product</button>
      </div>
    </form>
</body>
</html>