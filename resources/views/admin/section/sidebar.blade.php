 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-yellow elevation-4" style="position: fixed">
    <!-- Brand Logo -->
 <a href="{{'/home'}}" class="brand-link text-center" style="background-color: #000">
      <img src="{{url('/img/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image float-none" height="50" width="50">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="position: absolute; width: 100%">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&color=c02626&background=000" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h5><a href="#" class="d-block">{{Auth::user()->name ?? ''}}</a></h5>
         
        </div>
      </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a class="nav-link">
                  <i class="fas fa-money"></i>
                  <p>
                    Transactions
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/show-transactions')}}" class="nav-link">
                      <i class="fas fa-eye nav-icon icon"></i>
                      <p class="p-cont2">Show Transactions</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview menu-open">
                <a class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    Products
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/add-product')}}" class="nav-link">
                      <i class="fas fa-plus nav-icon icon"></i>
                      <p class="p-cont2">Add Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/show-products')}}" class="nav-link">
                      <i class="fas fa-eye nav-icon icon"></i>
                      <p class="p-cont2">Show Products</p>
                    </a>
                  </li>
                </ul>
              </li>

               <li class="nav-item has-treeview menu-open">
                <a class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    Orders
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/pending-orders')}}" class="nav-link">
                      {{-- <i class="fas fa-eye nav-icon icon"></i> --}}
                      <p class="p-cont2"><img src="{{url('/img/icon/cart.png')}}" height="22" width="22"/> Pending Orders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/accepted-orders')}}" class="nav-link">
                      {{-- <i class="fas fa-eye nav-icon icon"></i> --}}
                      <p class="p-cont2"><img src="{{url('/img/icon/cart.png')}}" height="22" width="22"/> Accepted Orders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/dispatch-orders')}}" class="nav-link">
                      {{-- <i class="fas fa-eye nav-icon icon"></i> --}}
                      <p class="p-cont2"><img src="{{url('/img/icon/cart.png')}}" height="22" width="22"/> Dispatched Orders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/delivered-orders')}}" class="nav-link">
                      {{-- <i class="fas fa-eye nav-icon icon"></i> --}}
                      <p class="p-cont2"><img src="{{url('/img/icon/cart.png')}}" height="22" width="22"/> Delivered Orders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/declined-orders')}}" class="nav-link">
                      {{-- <i class="fas fa-eye nav-icon icon"></i> --}}
                      <p class="p-cont2"><img src="{{url('/img/icon/cart.png')}}" height="22" width="22"/> Refunded Orders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/cancel-orders')}}" class="nav-link">
                      {{-- <i class="fas fa-eye nav-icon icon"></i> --}}
                      <p class="p-cont2"><img src="{{url('/img/icon/cart.png')}}" height="22" width="22"/> Cancel Orders</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview menu-open">
                <a class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    Newsletters
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/show-newsletter')}}" class="nav-link">
                      <i class="fas fa-eye nav-icon icon"></i>
                      <p class="p-cont2">Show Newsletters</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item has-treeview menu-open">
                <a class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    Enquiry
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/show-enquiries')}}" class="nav-link">
                      <i class="fas fa-eye nav-icon icon"></i>
                      <p class="p-cont2">Show Enquiries</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>