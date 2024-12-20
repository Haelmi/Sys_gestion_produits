<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>List of categories</title>
</head>
<body>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                position: 'top',
                toast: true,
            });
        </script>
    @endif
    <div class="categories_header">
        <a href="/" class="home-icon">
          <i class="fas fa-home"></i>
        </a>  
        <h3>Categories List</h3>
    </div>
    <button class="create_category_btn" id="categ_new_btn">New</button><br><br>
      
        <table class="categories">
        @foreach ($categories as $category)
            <tr class="row">
                <td class="category">Name : {{$category->name}} </td>
                <td class="category"><button class="update-button" data-id="{{ $category->id }}" > Update</button></td>
                <td>
                <button class="delete-category" onclick="confirmDeleteCat(event, {{ $category->id }})">
                  <i class="fas fa-times"></i>
                </button> 
                </td>
            </tr> 
        @endforeach
        </table>
        
     


      <script>
          // when you click on 'new' button  it takes you you to the product creation form
          document.getElementById('categ_new_btn').addEventListener('click', function () {
              window.location.href = '/api/category';
          });

          document.querySelectorAll('.update-button').forEach(button => {
            button.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-id'); 
            window.location.href = `/api/categories_up/${categoryId}`;
        });
        });

          // when you click on the delete cross  you the deletion confirmation message
          function confirmDeleteCat(event, id) {
            event.preventDefault(); // Prevent default page refresh

            if (confirm('Are you sure you want to delete this category?')) {
                fetch(`/api/categories_del/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete category');
                    }
                    return response.json();
                })
                .then(data => {
                    // Refresh the page immediately
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('There was an error deleting the category.');
                });
            }
        }
      </script>

</body>
</html>