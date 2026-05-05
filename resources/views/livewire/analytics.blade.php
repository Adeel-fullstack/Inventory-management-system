<div class="container mt-3 mb-3">
    <div class="card shadow">
        <div class="card-header bg-info text-white fw-bold">
            <i class="fa fa-chart-line"></i> {{ __('analytics.title') }}
        </div>
        <div class="card-body">
            
            {{-- Revenue Cards --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-success text-white shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-uppercase small">Today's Revenue</h6>
                            <h3 class="mb-0 fw-bold">${{ number_format($todayRevenue, 2) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-primary text-white shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-uppercase small">Monthly Revenue</h6>
                            <h3 class="mb-0 fw-bold">${{ number_format($monthlyRevenue, 2) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-uppercase small">Total Revenue</h6>
                            <h3 class="mb-0 fw-bold">${{ number_format($totalRevenue, 2) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Date Filters --}}
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label>{{ __('analytics.start_date') }}</label>
                    <input type="date" class="form-control" wire:model="startDate">
                </div>
                <div class="col-md-4">
                    <label>{{ __('analytics.end_date') }}</label>
                    <input type="date" class="form-control" wire:model="endDate">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-primary w-100" wire:click="search">
                        <i class="fa fa-search"></i> {{ __('analytics.search') }}
                    </button>
                </div>
            </div>

            {{-- Results --}}
            @if($sales && count($sales))
                <div class="table-responsive mt-3 mb-2">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('analytics.customer') }}</th>
                                <th>Products</th>
                                <th>{{ __('analytics.total') }}</th>
                                <th>{{ __('analytics.discount') }}</th>
                                <th>{{ __('analytics.final') }}</th>
                                <th>{{ __('analytics.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $index => $sale)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sale->customer->name ?? __('analytics.na') }}</td>
                                    <td>
                                        @foreach($sale->salesproducts as $sp)
                                            <span class="badge bg-light text-dark border">{{ $sp->shopproduct->product->title ?? 'N/A' }} ({{ $sp->quantity }})</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $sale->total }}</td>
                                    <td>{{ $sale->discount }}</td>
                                    <td>{{ $sale->final }}</td>
                                    <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif($startDate && $endDate)
                <p class="text-danger mt-3">{{ __('analytics.no_sales_found') }}</p>
            @endif

        </div>
    </div>
</div>
