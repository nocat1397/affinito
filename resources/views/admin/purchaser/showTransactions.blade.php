<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.link')
    <style>
        #data-success, #data-error {
            display: none;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini over">
<div class="wrapper">

    @include('admin.section.navbar')
    


  @include('admin.section.sidebar')

    {{-- // return Auth::user()->role->name; --}}
    {{-- {{ $role = Auth::user()->role->name }}

    @switch($role)
        @case('Manager')
            @include('admin.template.home.section.sidebar2')
            @break
        @case('Technician')
            @include('admin.template.home.section.sidebar3')
            @break
        @default
            @include('admin.template.home.section.sidebar')
    @endswitch
    @endif --}}
{{-- 
    @if (Auth::check())
    {{$role = Auth::user()->role->name}}
    @switch($role)
        @case('Admin') --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">New Service</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Service</li>
            </ol>
          </div><!-- /.col -->
          <div>
            
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>  
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid mb-5 pb-5">
          <div class="row justify-content-center">
            <div class="col-md-12 p-0">
              <div class="card shadow">
                <div class="card-body table-responsive">
                  <table class="table table-light" style="width: 100%">
                    <thead style="background-color: #000; color: #c02626; border: 1px solid #c02626">
                      <th>User Name</th>
                      <th>User ID</th>
                      <th>Order ID</th>
                      <th>Transaction Id</th>
                      <th>RZP Payment ID</th>
                      <th>RZP Order ID</th>
                      <th>Amount</th>
                      <th>Payment Mode</th>
                    </thead>
                    <tbody>
                      @foreach ($transactions as $transaction)
                      <tr>
                        <td>{{$transaction->user->name ?? ''}}</td>
                        <td>{{$transaction->user_id}}</td>
                        <td>{{$transaction->order_id ?? '-'}}</td>
                        <td>Tran_{{$transaction->id}}</td>
                        <td>{{$transaction->rzp_payment_id ?? '-'}}</td>
                        <td>{{$transaction->rzp_order_id ?? '-'}}</td>
                        <td>₹ {{$transaction->amount}}/-</td>
                        <td>{{$transaction->payment_mode ?? '-'}}</td>

                      </tr>
                      
                      @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  @include('admin.section.footer')
{{-- @endif --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
{{-- @include('admin.script') --}}
<script>
  $(document).ready(function() {
    $('.table').DataTable();
  });
</script>
</body>
</html>
