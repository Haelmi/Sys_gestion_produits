<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Product Creation Form</title>
</head>
<body>
    <div class="prod_creation_header">
        <a href="/api/products" class="home-icon">
          <i class="fas fa-home"></i>
        </a>  
        <h3>Create a product</h3>
    </div>
    <form method="POST" action="/api/product" enctype="multipart/form-data">
        <div class="prod_creation_container">
        @csrf
        <table class="product_creation_form">
            <tr>
                <td><label for="name">Name :</label></td>
                <td><input type="text" id="name" name="name" required><br>
                </td>
            </tr>
            <tr>
                <td><label for="description">Description :</label></td>
                <td><input type="text" id="description" name="description" required><br>
                </td>
            </tr>
            <tr>
                <td><label for="price">Price :</label></td>
                <td><input type="number" name="price" id="price" min="0" step="0.01" required><br>
                </td>
            </tr>
            <tr>
                <td><label for="category">Category:</label></td>
                <td><select name="category_id" id="category" required>
                        <option value="">-- Select an Option --</option>
                         @foreach ($Categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                    </select>  <br><br>
                </td>
            </tr>
            <tr>
                <td><label for="image">Upload Image:</label></td>
                <td><input type="file" name="image" accept="image/*" id="image"><br>
                </td>
            </tr>
        </table>
        <button type="submit" class="prod_creation_submit" id="prod_create_btn">Create Product</button>
        </div>

        
    </form>
    
</body>
</html>