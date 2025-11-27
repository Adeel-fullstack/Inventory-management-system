<div>
<div class="container mt-4">
 @include('includes.flash')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg mb-3">
                <div class="card bg-success text-white">
                    <div class="card-header border-0">
                        <i class="fa fa-plus-circle"></i> {{ __('products.edit_product') }}
                    </div>
                </div>
                <div class="card-body rounded-1">
                    <form wire:submit.prevent="updateProduct">

                        <div class="row">
                            <div class="col-md-12 mb-2 mt-3">
                                <label for="product_id" class="form-label">
                                    <i class="fas fa-tags"></i> {{ __('products.product') }}
                                </label>

                                {{-- Display product title and quantity as disabled input --}}
                                <input type="text" 
                                    class="form-control" 
                                    value="{{ optional($products->where('id', $product_id)->first())->title }}:
                                           {{ optional($products->where('id', $product_id)->first())->quantity }}" 
                                    disabled>

                                {{-- Hidden field to retain product_id --}}
                                <input type="hidden" wire:model="product_id">

                                @error('product_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row">
                            <div class="col-sm-12 mb-2 mt-4">
                                <label for="description" class="form-label">
                                    <i class="fas fa-file-lines"></i> {{ __('products.description_optional') }}
                                </label>
                                <textarea wire:model="description" id="description" rows="3" class="form-control"></textarea>
                                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <!-- Price -->
                            <div class="col-md-6 mb-2 mt-3">
                                <label for="price" class="form-label">
                                    <i class="fas fa-money-bill-wave"></i> {{ __('products.price_optional') }}
                                </label>
                                <input wire:model="price" id="no-arrows" type="number" step="any" min="0" class="form-control">
                                @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6 mb-2 mt-3">
                                <label for="quantity" class="form-label">
                                    <i class="fas fa-sort-numeric-up"></i> {{ __('products.quantity') }}
                                </label>
                                <input wire:model="quantity" type="number" class="form-control">
                                @error('quantity') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        <div class="row">
                            <div class="col-md-12 mb-2 mt-4">
                                <label for="thumbnail" class="form-label">
                                    <i class="fas fa-image"></i> {{ __('products.thumbnail_optional') }}
                                </label>
                                <input wire:model="thumbnail" type="file" id="thumbnail" class="form-control">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success rounded-2 me-2">
                                <i class="fa fa-save"></i> {{ __('products.update') }}
                                <i class="fa fa-spinner fa-spin" wire:loading></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional Right Section -->
    </div>
</div>
</div>
