<div class="container mt-4 mb-3">
    <div class="card shadow">
        <div class="card-header text-white fw-bold" style="background-color:#009933;">
            <i class="fa fa-box"></i> {{ __('products.product_detail') }}
        </div>
                    {{-- Horizontal Product Info Table --}}
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-striped w-100 text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">{{ __('products.brand') }}</th>
                            <th class="text-center">{{ __('products.category') }}</th>
                            <th class="text-center">{{ __('products.title') }}</th>
                            <th class="text-center">{{ __('products.quantity') }}</th>
                            <th class="text-center">{{ __('products.price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $product->brand?->title ?? __('products.not_available') }}</td>
                            <td>{{ $product->category?->title ?? __('products.not_available') }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="card-body">
            {{-- Thumbnail --}}
            <div class="mb-3">
                <h5><strong>{{ __('products.thumbnail') }}: </strong></h5>
                @if ($product->thumbnail)
                    <img src="https://aknurtextile.com/storage/app/public/{{ $product->thumbnail }}" class="img-fluid rounded" style="max-width: 400px;" alt="Product Thumbnail">
                @else
                    <p>{{ __('products.not_available') }}</p>
                @endif
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <h5><strong>{{ __('products.description') }}:</strong></h5>
             <td>{{ $product->description ?? 'N/A' }}</td>

            </div>

            <div class="ms-3 mb-3">
                        <a href="{{ route('warehouse.stock-management') }}" class="btn text-light" style="background-color:#009933;">
                            {{ __('products.back_to_list') }}
                        </a>
                    </div>

        </div>
    </div>
</div>
