<div>
    <div class="card shadow">
            @include('includes.flash')
        <div class="card-header text-white fw-bold" style="background-color:#009933;">
            <i class="fa fa-users"></i> {{ __('sales.sales_history') }}
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('sales.customer') }}</th>
                        <th>{{ __('sales.total') }}</th>
                        <th>{{ __('sales.discount') }}</th>
                        <th>{{ __('sales.final') }}</th>
                        <th>{{ __('sales.status') }}</th>
                        <th>{{ __('sales.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $index => $sale)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sale->customer?->name ?? __('sales.na') }}</td>
                            <td>{{ $sale->total }}</td>
                            <td>{{ $sale->discount }}</td>
                            <td>{{ $sale->final }}</td>
                            <td>
                                @if($sale->status == 1)
                                    <span class="badge bg-success">Completed</span>
                                @elseif($sale->status == 2)
                                    <span class="badge bg-danger">Returned</span>
                                @else
                                    <span class="badge bg-secondary">{{ $sale->status }}</span>
                                @endif
                            </td>


                            <td>
                                <a href="{{ route('sales.detail', $sale->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> {{ __('sales.view') }}
                                </a>
                                <button class="btn btn-danger btn-sm" wire:click="deleteSale({{ $sale->id }})" wire:confirm="{{ __('sales.delete_confirm') }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                 <button wire:click="returnSale({{ $sale->id }})" class="btn btn-success btn-sm" wire:loading.attr="disabled">
                                <i class="fa-solid fa-rotate-left"></i> {{ __('sales.return') }}
                                 </button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">{{ __('sales.no_sales_found') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
