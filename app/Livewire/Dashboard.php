<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\User;

class Dashboard extends Component
{

      public  $totalproducts;
      public $totalsales;
      public $totalcustomers;
      public $totalusers;
      public $todayRevenue;
      public $monthlyRevenue;
      public $totalRevenue;


     public function mount()
        {
        $this->totalproducts = Product::count();
        $this->totalsales=Sale::count();
        $this->totalcustomers = Customer::count();
        $this->totalusers = User::count();

        // Revenue calculations
        $this->todayRevenue = Sale::whereDate('created_at', \Carbon\Carbon::today())->sum('final');
        $this->monthlyRevenue = Sale::whereMonth('created_at', \Carbon\Carbon::now()->month)
            ->whereYear('created_at', \Carbon\Carbon::now()->year)
            ->sum('final');
        $this->totalRevenue = Sale::sum('final');

        }

    public function render()
    {
        return view('livewire.dashboard')->layout('components.layouts.app');
    }
}
