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
    <div class="content-wrapper mt-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card p-3 shadow border border-0" style="background:#c02626">
                <h3 class="text-center text-light">Welcome to Affinito</h3>
              </div>
            </div>
            {{--  <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
              <div class="inner">
              <h3>150</h3>
              <p>New Orders</p>
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
              <h3>150</h3>
              <p>New Orders</p>
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
              <h3>150</h3>
              <p>New Orders</p>
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
              <h3>150</h3>
              <p>New Orders</p>
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
                <h3>150</h3>
                <p>New Orders</p>
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
              <h3>150</h3>
              <p>New Orders</p>
              </div>
              <div class="icon">
              <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>  --}}
         

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content -->

  <!-- /.content-wrapper -->
        @include('admin.script')
        @else
        
        @endif
    </div>
    </body>
    </html>
    

