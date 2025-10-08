@forelse($products as $product)
<div class="col-12 col-sm-6 col-lg-4">
  <div class="card h-100 shadow-sm">
    <img src="{{$product->url}}" class="card-img-top product-img" alt="Product 1">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">
        {{$product->title}}
      </h5>
      <p class="card-text text-muted mb-3">
        {{\Str::limit($product->content,100)}}
      </p>
      <div class="mt-auto d-flex justify-content-between align-items-center">
        <strong>${{rand(20,50)}}</strong>
        <button class="btn btn-sm btn-primary">Add to Cart</button>
      </div>
    </div>
  </div>
</div>
@empty
@endforelse