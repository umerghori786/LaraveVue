<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products — Bootstrap Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .product-img {
        height: 180px;
        object-fit: cover;
      }
    </style>
  </head>
  <body>
    

    <main class="container my-5">
      <h1 class="mb-4">Products</h1>
      <div class="row g-4" id="data-wrapper">

        {{-- here comes data of products --}}
        @include('product.data')
        {{-- end --}}

        

      </div>
        {{-- it is load --}}
        @include('product.loader')
        {{-- end --}}
    </main>

        {{-- this is script part --}}
        @include('product.script')
        {{-- end --}}
  </body>
</html>
