@forelse ($products as $product)
    @include('sub.product-card', ['product' => $product])
@empty
    <h2> No products found</h2>
@endforelse
