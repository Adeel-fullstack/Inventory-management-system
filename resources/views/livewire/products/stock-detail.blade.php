<div class="container mt-4 mb-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header text-white fw-bold" style="background-color:#009933;">
                    <i class="fa fa-box"></i> {{ __('products.product_detail') }}
                </div>

                {{-- Horizontal Product Info Table --}}
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped w-100 text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ __('products.title') }}</th>
                                <th class="text-center">{{ __('products.quantity') }}</th>
                                <th class="text-center">{{ __('products.price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product->title }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->product->price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    {{-- 📷 Thumbnail --}}
                    <div class="mb-3">
                        <h5><strong>{{ __('products.thumbnail') }}:</strong></h5>

                        @if ($product->thumbnail)
                            <img src="{{ asset('storage/' . $product->product->thumbnail) }}"
                                 class="img-fluid rounded"
                                 style="max-width: 400px;"
                                 alt="{{ __('products.thumbnail') }}">
                        @else
                            <p>{{ __('products.not_available') }}</p>
                        @endif
                    </div>

                    {{-- 📝 Description --}}
                    <div class="mb-3 ms-3">
                        <h5><strong>{{ __('products.description') }}:</strong></h5>
                        <p>{{ $product->product->description ?? 'N/A' }}</p>
                    </div>

                    {{-- 🔙 Back Button --}}
                    <div class="ms-3 mb-3">
                        <a href="{{ route('products.stock.management') }}" class="btn text-light" style="background-color:#009933;">
                            {{ __('products.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
