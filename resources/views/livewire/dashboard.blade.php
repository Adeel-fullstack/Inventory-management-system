<div>
    <div>
        <div class="container-fluid">
            <div class="row my-4 ">
                <!-- Total Products -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-light h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">{{ __('dashboard.total_products') }}</h6>
                                <h5 class="fw-bold pt-2">{{ $totalproducts }}</h5>
                            </div>
                            <div class="text-success fs-2">
                                <i class="fas fa-sack-dollar fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-primary text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">{{ __('dashboard.all_users') }}</h6>
                                <h5 class="fw-bold pt-2 ">{{ $totalusers }}</h5>
                            </div>
                            <div class="text-white fs-2">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-info text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">{{ __('dashboard.total_customers') }}</h6>
                                <h5 class="fw-bold pt-2"> {{ $totalcustomers }}</h5>
                            </div>
                            <div class="text-white fs-2">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Sales -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-warning text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">{{ __('dashboard.total_sales') }}</h6>
                                <h5 class="fw-bold pt-2">{{ $totalsales }}</h5>
                            </div>
                            <div class="text-white fs-2">
                                <i class="fas fa-calendar-day fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Revenue -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-success text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">Today's Revenue</h6>
                                <h5 class="fw-bold pt-2">${{ number_format($todayRevenue, 2) }}</h5>
                            </div>
                            <div class="text-white fs-2">
                                <i class="fas fa-money-bill-trend-up fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Revenue -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-secondary text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">Monthly Revenue</h6>
                                <h5 class="fw-bold pt-2">${{ number_format($monthlyRevenue, 2) }}</h5>
                            </div>
                            <div class="text-white fs-2">
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow rounded-1 border-0 bg-dark text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-6">Total Revenue</h6>
                                <h5 class="fw-bold pt-2">${{ number_format($totalRevenue, 2) }}</h5>
                            </div>
                            <div class="text-white fs-2">
                                <i class="fas fa-vault fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
