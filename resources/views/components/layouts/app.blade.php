

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <title>Crony | Web Technologies</title>

    <link href="{{ asset('assets/bootstrap-5.3.6-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap-icons-1.13.1/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/chartist/chartist.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.7.2-web/css/all.min.css') }}">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/bracket.css')}}">
  </head>

  <body>
    <div class="br-logo"><a href="#"><span>[</span>Crony<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-10">{{ __('dashboard.navigation') }}</label>
      <div class="br-sideleft-menu">
        <a href="{{ route('dashboard')}}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">{{ __('dashboard.dashboard') }}</span>
          </div>
        </a>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fas fa-box-open"></i>
            <span class="menu-item-label">{{ __('dashboard.products') }}</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
           <li class="nav-item"><a href="{{ route('products.shop.product')}}" class="nav-link {{ Request::routeIs('products.shop.product') ? 'active' : '' }}">{{ __('dashboard.shop_products') }}</a></li>
            <li class="nav-item"><a href="{{ route('products.stock.management')}}" class="nav-link {{ Request::routeIs('products.stock.management') ? 'active' : '' }}">{{ __('dashboard.stock_management') }}</a></li>
        </ul>

         <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fas fa-box-open"></i>
            <span class="menu-item-label">{{ __('dashboard.ware_house') }}</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('warehouse.brand')}}" class="nav-link {{ Request::routeIs('warehouse.brand')? 'active' : '' }}">{{ __('dashboard.brand') }}</a></li>
          <li class="nav-item"><a href="{{ route('warehouse.category')}}" class="nav-link {{ Request::routeIs('warehouse.category')? 'active' : '' }} ">{{ __('dashboard.category') }}</a></li>
          <li class="nav-item"><a href="{{ route('warehouse.new')}}" class="nav-link {{ Request::routeIs('warehouse.new')? 'active' : '' }}">{{ __('dashboard.new_product') }}</a></li>
          <li class="nav-item"><a href="{{ route('warehouse.stock-management')}}" class="nav-link {{ Request::routeIs('warehouse.stock-management')? 'active' : '' }}">{{ __('dashboard.stock_management') }}</a></li>


          
        </ul>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fas fa-cart-shopping"></i>
            <span class="menu-item-label">{{ __('dashboard.sales') }}</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('sales.new')}}" class="nav-link {{ Request::routeIs('sales.new')? 'active' : '' }}">{{ __('dashboard.new_sales') }}</a></li>
          <li class="nav-item"><a href="{{ route('sales.history')}}" class="nav-link {{ Request::routeIs('sales.history')? 'active' : '' }}">{{ __('dashboard.history') }}</a></li>
           <li class="nav-item"><a href="{{ route('sales.products')}}" class="nav-link">Products History</a></li>
        </ul>

        <a href="{{ route('analytics')}}" class="text-white">
          <div class="br-menu-item">
            <i class="fas fa-chart-pie"></i>
            <span class="menu-item-label">{{ __('dashboard.analytics') }}</span>
          </div>
        </a>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fas fa-users"></i>
            <span class="menu-item-label">{{ __('dashboard.customers') }}</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">

            <li class="nav-item">
        <a href="{{ route('customers.create') }}" class="nav-link {{ Request::routeIs('customers.create') ? 'active' : '' }}">
    {{ __('dashboard.create_customer') }}
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('customers.history') }}" class="nav-link {{ Request::routeIs('customers.history') ? 'active' : '' }}">
    {{ __('dashboard.history') }}
  </a>
</li>


         </ul>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fas fa-users"></i>
            <span class="menu-item-label">{{ __('dashboard.users') }}</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">

        <li class="nav-item">
  <a href="{{ route('users.create') }}" class="nav-link {{ Request::routeIs('users.create') ? 'active' : 'user.create' }}">
    {{ __('dashboard.create_user') }}
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('users.all') }}" class="nav-link {{ Request::routeIs('users.all') ? 'active' : '' }}">
    {{ __('dashboard.all_users') }}
  </a>
</li>

           </ul>

        <a href="{{ route('setting')}}" class="text-white">
          <div class="br-menu-item">
            <i class="fas fa-cogs"></i>
            <span class="menu-item-label">{{ __('dashboard.settings') }}</span>
          </div>
        </a>

        <a href="{{ route('logout')}}" class="text-white">
          <div class="br-menu-item">
            <i class="fas fa-sign-out-alt"></i>
            <span class="menu-item-label">{{ __('dashboard.logout') }}</span>
          </div>
        </a>
      </div>
    </div>

    <label class="sidebar-label pd-x-15 mg-t-25 mg-b-20 tx-info op-9">{{ __('dashboard.information_summary') }}</label>

    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div>
      <div class="br-header-right">
        <nav class="nav">


       <div class="d-flex align-items-center me-5">
    <!-- Language Dropdown -->

<div>
      <a href="{{ route('current-report') }}" class="btn btn-sm pull-left btn-success mt-2 text-light me-3">
          <i class="fa fa-file-excel"></i> Export Current Report
      </a>
    </div>

    <div class="me-2">
        <select 
            class="form-select form-select-sm bg-transparent mt-2 border-0"
            style="width: auto; font-weight: 500; cursor: pointer;"
            onchange="window.location.href='/language/' + this.value">
            <option value="en" @selected(app()->getLocale() === 'en')>English</option>
            <option value="tr" @selected(app()->getLocale() === 'tr')>Türkçe</option>
        </select>
    </div>

    <!-- Export Button -->
    
</div>


          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> {{ __('dashboard.edit_profile') }}</a></li>
                <li><a href=""><i class="icon ion-ios-gear"></i> {{ __('dashboard.settings') }}</a></li>
                <li><a href=""><i class="icon ion-ios-download"></i> {{ __('dashboard.downloads') }}</a></li>
                <li><a href=""><i class="icon ion-ios-star"></i> {{ __('dashboard.favorites') }}</a></li>
                <li><a href=""><i class="icon ion-ios-folder"></i> {{ __('dashboard.collections') }}</a></li>
                <li><a href=""><i class="icon ion-power"></i> {{ __('dashboard.sign_out') }}</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="br-mainpanel">
      <div class="br-content">
        <div class="content-wrapper">
          <div class="container-fluid">
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>

    @livewireScripts
    <script src="{{ asset('lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset('lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{ asset('lib/moment/moment.js')}}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{ asset('lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
    <script src="{{ asset('lib/peity/jquery.peity.js')}}"></script>
    <script src="{{ asset('lib/chartist/chartist.js')}}"></script>
    <script src="{{ asset('lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('lib/d3/d3.js')}}"></script>
    <script src="{{ asset('lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{ asset('assets/bootstrap-5.3.6-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bracket.js')}}"></script>
    <script src="{{ asset('js/ResizeSensor.js')}}"></script>
    <script src="{{ asset('js/dashboard.js')}}"></script>

    <script>

      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

  </body>
</html>
































































































