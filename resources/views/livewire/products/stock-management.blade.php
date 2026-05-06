<div>
    <div class="container-fluid mb-3">
        @include('includes.flash')

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header text-white fw-bold" style="background-color:#009933;">
                        <i class="fa fa-users"></i> {{ __('products.product_lists') }}
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('products.title') }}</th>
                                    <th>{{ __('products.quantity') }}</th>
                                    <th>{{ __('products.price') }}</th>
                                    <th>{{ __('products.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->product->title }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->product->price ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('products.stock-detail', $product->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button wire:click="openQuantityModal({{ $product->id }})" class="btn btn-sm btn-warning">
                                            Add More
                                            </button>
                                             <a href="{{ route('products.history',$product->product_id)}}" class="btn btn-info btn-sm text-light">
                                                History
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">{{ __('products.products_not_found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Quantity Modal --}}
                @if($showQuantityModal)
                    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Add More Quantity</h5>
                                    <button type="button" class="btn-close" wire:click="$set('showQuantityModal', false)"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Warehouse Quantity:</strong> 
                                            <span class="badge bg-secondary">{{ $warehouseQuantity }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Current Shop Quantity:</strong> 
                                            <span class="badge bg-info">{{ $shopQuantity }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="additionalQuantity">Add Quantity</label>
                                        <input 
                                            type="number" 
                                            id="additionalQuantity" 
                                            wire:model.live="additionalQuantity" 
                                            min="1" 
                                            max="{{ $warehouseQuantity }}"
                                            class="form-control"
                                            placeholder="Enter quantity to add"
                                        >
                                        @error('additionalQuantity') 
                                            <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>

                                    <div class="alert alert-success mt-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong>Updated Shop Quantity:</strong>
                                            <span class="badge bg-success fs-5">
                                                {{ $this->updatedShopQuantity }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button wire:click="updateQuantity" class="btn btn-success" @if(!$additionalQuantity) disabled @endif>
                                        <i class="fa fa-check-circle"></i> Update
                                    </button>
                                    <button wire:click="$set('showQuantityModal', false)" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>