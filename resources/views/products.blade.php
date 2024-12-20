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
    <title>List of Products</title>
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
      <div class="products_header">
        <a href="/" class="home-icon">
          <i class="fas fa-home"></i>
        </a>  
        <h3>Products List</h3>
      </div>
      <button class="create_product_btn" id="prod_new_btn">New</button><br><br>
      <div class="products_container">
        @foreach ($products as $product)
        <a href="{{route('products.update_product', $product->id)}}">
        <button class="delete-product" onclick="confirmDelete(event, {{ $product->id }})">
          <i class="fas fa-times"></i>
        </button>
        <div class="products">
          <div class="product_info">
           Name : {{$product->name}}<br><br>
           Description : {{$product->description}}<br><br>
           Price : {{$product->price}} DH<br><br>
           Category : {{$product->category->name}}
           </div>
           <div class="product_image">
           <img src="{{ asset('storage/' . $product->image) }}" style="max-width: 200px; height: auto;">
           </div>
        </div>
          </a>
        @endforeach
      </div>


      <div class="pagination">
      {{ $products->links() }}
      </div>
      

      <script>
          // when you click on 'new' button  it takes you you to the product creation form
          document.getElementById('prod_new_btn').addEventListener('click', function () {
              window.location.href = '/api/product';
          });

          // when you click on the delete cross  you the deletion confirmation message
          function confirmDelete(event, id) {
            event.preventDefault(); // Prevent default page refresh

            if (confirm('Are you sure you want to delete this product?')) {
                fetch(`/api/products_del/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete product');
                    }
                    return response.json();
                })
                .then(data => {
                    // Refresh the page immediately
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('There was an error deleting the product.');
                });
            }
        }
      </script>
      
      

</body>
</html>