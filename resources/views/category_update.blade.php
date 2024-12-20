<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Category Update Form</title>
</head>
<body>
    <div class="categ_update_header">
        <a href="/api/categories" class="home-icon">
          <i class="fas fa-home"></i>
        </a>  
        <h3>Update a category</h3>
    </div>
    <form method="POST" action="{{route('categories.update_category', $category->id)}}">
        @csrf
        @method('PUT')
        <table class="category_update_form">
            <tr>
               <td><label for="name">Name :</label></td>
               <td> <input type="text" id="name" name="name" value="{{$category->name}}"><br> </td>
            </tr>
        </table>

        <button type="submit" class="categ_update_submit" id="categ_update_btn">Update Category</button>
      
       
    </form>
</body>
</html>