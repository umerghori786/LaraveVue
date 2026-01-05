<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <!-- Bootstrap CSS (v5 CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Porduct Information</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>title</th>
                <th>Image</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>

        @foreach($products as $key=> $product)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$product->title}}</td>
                <td><img src="{{$product->url}}" class="card-img-top product-img" alt="Product 1"></td>
                <td>{{\Str::limit($product->content,100)}}</td>
            </tr>
        @endforeach   
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (Optional for components like modals or dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
