<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.link')

</head>
<body>
    <div class="wrapper">
        @if(Auth::user()->role->name !== "Customer")
        @include('admin.section.navbar')
        @include('admin.section.sidebar')
          <!-- Content Wrapper. Contains page content -->


    <!-- Main content -->
    {{--  <div class="content-wrapper mt-4">
        <div class="container">
          <div class="row justify-content-center">
            
             <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
              <div class="inner">
              <h3>{{$pendingOrders}}</h3>
              <h4>Pending Orders</h4>
              </div>
              <div class="icon">
              <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
              <div class="inner">
              <h3>{{$completeOrders}}</h3>
              <p>Completed Orders</p>
              </div>
              <div class="icon">
              <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            <div class="col-lg-3 col-6">

              <div class="small-box bg-danger">
              <div class="inner">
              <h3>{{$dispatchOrders}}</h3>
              <p>Dispatch Orders</p>
              </div>
              <div class="icon">
              <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            <div class="col-lg-3 col-6">

              <div class="small-box bg-warning">
              <div class="inner">
              <h3>{{$deliveredOrders}}</h3>
              <p>Delivered Orders</p>
              </div>
              <div class="icon">
              <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>

              <div class="col-lg-3 col-6">

                <div class="small-box bg-secondary">
                <div class="inner">
                <h3>{{$cancleOrders}}</h3>
                <p>Cancle Orders</p>
                </div>
                <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
            <div class="col-lg-3 col-6">

              <div class="small-box bg-primary">
              <div class="inner">
              <h3>{{$totalOrders}}</h3>
              <p>Total Orders</p>
              </div>
              <div class="icon">
              <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div> 
         

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>  --}}
    <!-- /.content -->


    <div class="content-wrapper mt-4">
      <div class="container pt-5">
        <div class="row align-items-stretch justify-content-center">
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Orders</h4>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
              <span class="hind-font caption-12 c-dashboardInfo__count">{{$totalOrders}}</span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Pending Orders</h4>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
              <span class="hind-font caption-12 c-dashboardInfo__count">{{$pendingOrders}}</span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Completed Orders</h4>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
              <span class="hind-font caption-12 c-dashboardInfo__count">{{$completeOrders}}</span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Dispatch Orders</h4>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
              <span class="hind-font caption-12 c-dashboardInfo__count">{{$dispatchOrders}}</span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Delivered Orders</h4>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
              <span class="hind-font caption-12 c-dashboardInfo__count">{{$deliveredOrders}}</span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Cancle Orders</h4>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
                </div>
              <span class="hind-font caption-12 c-dashboardInfo__count">{{$cancleOrders}}</span>
            </div>
          </div>
          
        </div>
      </div>
    </div>

  <!-- /.content-wrapper -->
        @include('admin.script')
        @else
        
        @endif
    </div>
    </body>
    </html>
    

