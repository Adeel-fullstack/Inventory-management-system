<div>
<div class="container mt-4">
  @include('includes.flash')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-body rounded-1">
                    <div class="card bg-success text-white">
                        <div class="card-header border-0">
                            <i class="fa fa-plus-circle"></i> {{ __('products.edit_product') }}
                        </div>
                    </div>
          <form wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Brand -->
                            <div class="col-md-6 mb-2 mt-3">
                                <label for="brand_id" class="form-label">
                                    <i class="fas fa-tags"></i> {{ __('products.brand') }}
                                </label>
                                <select wire:model.defer="brand_id" id="brand_id" class="form-control">
                                    <option value="">{{ __('products.select_brand') }}</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-2 mt-3">
                                <label for="category_id" class="form-label">
                                    <i class="fas fa-folder-open"></i> {{ __('products.category') }}
                                </label>
                                <select wire:model="category_id" id="category_id" class="form-control">
                                    <option value="">{{ __('products.select_category') }}</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="mb-2 mt-2">
                            <label for="title" class="form-label">
                                <i class="fas fa-pen"></i> {{ __('products.title') }}
                            </label>
                            <input wire:model="title" type="text" id="title" class="form-control">
                            @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-2 mt-4">
                            <label for="description" class="form-label">
                                <i class="fas fa-file-lines"></i> {{ __('products.description_optional') }}
                            </label>
                            <textarea wire:model="description" id="description" rows="3" class="form-control" required></textarea>
                            @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <!-- Price and Quantity -->
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2 mt-3">
                                <label for="price" class="form-label">
                                    <i class="fas fa-money-bill-wave"></i> {{ __('products.price_optional') }}
                                </label>
                                <input wire:model="price" type="number" step="any" min="0" id="price" class="form-control">
                                @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-2 mt-3">
                                <label for="quantity" class="form-label">
                                    <i class="fas fa-sort-numeric-up"></i> {{ __('products.quantity') }}
                                </label>
                                <input wire:model="quantity" type="number" id="quantity" class="form-control">
                                @error('quantity') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        <div class="mb-2 mt-4">
                            <label for="thumbnail" class="form-label">
                                <i class="fas fa-image"></i> {{ __('products.thumbnail_optional') }}
                            </label>
                            <input wire:model.defer="thumbnail" type="file" id="thumbnail" class="form-control">
                            @error('thumbnail') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <!-- Submit -->
                        <div class="mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success rounded-2 me-2">
                                {{ __('products.update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional Preview Area -->
        <div class="col-lg-8"></div>
    </div>
</div>
</div>

