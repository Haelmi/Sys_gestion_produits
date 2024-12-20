<!DOCTYPE html>
<html>
<head>
    <title>Category Deletion Form</title>
</head>
<body>
<form method="POST" action="{{ route('categories.delete_category', $category->id) }}">
    @csrf
    @method('DELETE')  
    <button type="submit">Delete</button>
</form>

</body>
</html>