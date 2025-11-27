<div>
    @include('includes.flash')

    <!-- Sale Form -->
    <div class="card">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-plus-circle"></i> {{ __('sales.new_sale') }}
            </div>
            <div>
                <label class="mb-0">{{ __('sales.total') }}: {{ number_format($this->getTotal(), 2) }}</label>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3 mb-2">
                    <label><i class="fa fa-user"></i> {{ __('sales.customer') }}</label>
                    <select wire:model.defer="customer_id" class="form-control">
                        <option value="">{{ __('sales.select_customer') }}</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ ucfirst($customer->name) }}</option>
                        @endforeach
                    </select>
                    @error('customer_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-sm-3 mb-2">
                    <label><i class="fa fa-box"></i> {{ __('sales.product') }}</label>
                    <select wire:model="product_id" class="form-control">
                        <option value="">{{ __('sales.select_product') }}</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ ucfirst($product->product->title) }} ({{ __('sales.stock') }}: {{ $product->quantity }})</option>
                        @endforeach
                    </select>
                    @error('product_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-sm-3 mb-2">
                    <label><i class="fa fa-sort-numeric-up"></i> {{ __('sales.quantity') }}</label>
                    <input type="number" wire:model.live="quantity" class="form-control" min="1">
                    @error('quantity') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-sm-2  mb-2">
                    <label for="amount" class="form-label"><i class="fa fa-money-bill-alt"></i> {{ __('sales.amount') }}</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="amount" wire:model="amount" readonly>
                    </div>
                    @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-1 d-flex align-items-end mb-3">
                    <button wire:click="addSale" class="btn btn-primary btn-sm w-110">
                        <i class="fa fa-plus-circle"></i> {{ __('sales.add') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sale Items -->
    <div class="mt-3">
        @if(count($cart) > 0)
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="fa fa-list"></i> {{ __('sales.sale_items') }}
                </div>
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th><i class="fa fa-box"></i> {{ __('sales.product') }}</th>
                            <th><i class="fa fa-sort-numeric-up"></i> {{ __('sales.qty') }}</th>
                            <th><i class="fa fa-dollar-sign"></i> {{ __('sales.price') }}</th>
                            <th><i class="fa fa-calculator"></i> {{ __('sales.subtotal') }}</th>
                            <th><i class="fa fa-cogs"></i> {{ __('sales.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $index => $item)
                            <tr>
                                <td>{{ $item['product_name'] }}</td> <!-- ✅ Fixed -->
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['price'], 2) }}</td>
                                <td>{{ number_format($item['subtotal'], 2) }}</td>
                                <td>
                                    <button wire:click="removeItem({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-2">
                <button wire:click="saveSale" class="btn btn-info float-end btn-sm">
                    <i class="fa fa-save"></i> {{ __('sales.save_sale') }}
                </button>
            </div>
        @else
            <div class="alert alert-info">
                {{ __('sales.no_items') }}
            </div>
        @endif
    </div>
</div>
