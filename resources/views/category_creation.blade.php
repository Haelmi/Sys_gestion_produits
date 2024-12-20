<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Category Creation Form</title>
</head>
<body>
    <div class="categ_creation_header">
        <a href="/api/categories" class="home-icon">
          <i class="fas fa-home"></i>
        </a>  
        <h3>Create a category</h3>
    </div>
    <form method="POST" action="/api/category">
        @csrf
        <table class="category_creation_form">
            <tr>
               <td><label for="name">Name :</label></td>
               <td> <input type="text" id="name" name="name"><br> </td>
            </tr>
        </table>
    
        <button type="submit" class="categ_creation_submit" id="categ_creation_btn">Create Category</button>
        
    
    </form>
</body>
</html>