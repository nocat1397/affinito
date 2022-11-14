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
    <div class="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card p-3 shadow border border-0" style="background:#c02626">
                <h3 class="text-center text-light">Welcome to Affinito</h3>
              </div>
            </div>

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
    

