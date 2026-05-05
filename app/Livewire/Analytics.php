<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sale;
use Carbon\Carbon; 


class Analytics extends Component
{


    public $startDate;
    public $endDate;
    public $sales = [];
    
    public $todayRevenue = 0;
    public $monthlyRevenue = 0;
    public $totalRevenue = 0;

    public function mount()
    {
        $this->calculateStats();
    }

    public function calculateStats()
    {
        $this->todayRevenue = Sale::whereDate('created_at', Carbon::today())->sum('final');
        $this->monthlyRevenue = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('final');
        $this->totalRevenue = Sale::sum('final');
    }

    public function search()
    {
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $this->sales = Sale::with('customer', 'salesproducts.shopproduct.product')
            ->whereBetween('created_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ])->get();
    }


    public function render()
    {
        return view('livewire.analytics');
    }
}
