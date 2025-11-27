<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-history"></i> {{ __('products.title 1') }}
            </div>
            <div>
                <button wire:click="export" class="btn btn-light btn-sm">
                    <i class="fa fa-file-excel"></i> Export to Excel
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('products.product') }}</th>
                        <th>{{ __('products.warehouse_stock') }}</th>
                        <th>{{ __('products.shop_stock') }}</th>
                        <th>{{ __('products.transferred_qty') }}</th>
                        <th>{{ __('products.date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $index => $record)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $record->product->title ?? 'N/A' }}</td>
                            <td>{{ $record->warehouse_stock }}</td>
                            <td>{{ $record->shop_stock }}</td>
                            <td>{{ $record->transfer_quantity }}</td>
                            <td>{{ $record->created_at->diffForHumans() }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">{{ __('products.no_records') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
