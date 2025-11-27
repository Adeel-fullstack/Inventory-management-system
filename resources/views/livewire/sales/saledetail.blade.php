<div>
    @if($selectedSale && $selectedSaleProducts)
        <div class="container mb-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card shadow-lg bg-white">
                        <div class="card-header text-white d-flex justify-content-between" style="background-color:#009933;">
                            <strong>{{ __('sales.sale_detail') }} - ID: {{ $selectedSale->id }}</strong>
                            <a href="{{ route('sales.history') }}" class="btn btn-sm btn-light">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <p><strong>{{ __('sales.customer') }}:</strong> {{ ucfirst($selectedSale->customer?->name ?? __('sales.na')) }}</p>
                            <p><strong>{{ __('sales.date') }}:</strong> {{ $selectedSale->created_at->format('d-M-Y h:i A') }}</p>

                            <hr>

                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('sales.product') }}</th>
                                        <th>{{ __('sales.qty') }}</th>
                                        <th>{{ __('sales.amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($selectedSaleProducts as $item)
                                        <tr>
                                            <td>{{ $item->shopproduct?->product?->title ?? __('sales.na') }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <hr>

                            <p><strong>{{ __('sales.total') }}:</strong> Rs. {{ number_format($selectedSale->total, 2) }}</p>
                            <p><strong>{{ __('sales.discount') }}:</strong> Rs. {{ number_format($selectedSale->discount, 2) }}</p>
                            <p><strong>{{ __('sales.final') }}:</strong> Rs. {{ number_format($selectedSale->final, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
