<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.link')
    <style>
        #data-success, #data-error {
            display: none;
        }
        .img-container {
          position: relative;
          width: 20%;
          display: inline-block;

        }
        .image {
          opacity: 1;
          display: block;
          transition: .5s ease;
          backface-visibility: hidden;
          padding: 2px;
        }
        .middle {
          transition: .5s ease;
          opacity: 0;
          position: absolute;
          top: 48%;
          left: 64%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
        }
        .img-container:hover .image {
          opacity: 0.3;
        }
        .img-container:hover .middle {
          opacity: 1;
        }
        .text {
          background-color: red;
          color: white;
          font-size: 16px;
          padding: 1px 8px;
        }

        h2 {
  color: gray;
  font-size: var(--font-size-small);
  line-height: 1.5;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 3px;
}
section {
  margin-bottom: 2rem;
}

.progressBar {
  display: flex;
  justify-content: space-between;
  list-style: none;
  padding: 0;
  margin: 0 0 1rem 0;
}
.progressBar a {
  flex: 2;
  position: relative;
  padding: 0 0 14px 0;
  font-size: var(--font-size-default);
  line-height: 1.5;
  color: #c02626;
  font-weight: 600;
  white-space: nowrap;
  overflow: visible;
  min-width: 0;
  text-align: center;
  text-decoration: none;
  border-bottom: 2px solid lightgray;
}
.progressBar a:first-child,
.progressBar a:last-child {
  flex: 1;
}
.progressBar a:last-child {
  text-align: right;
}
.progressBar a:before {
  content: "";
  display: block;
  width: 12px;
  height: 12px;
  background-color: lightgray;
  border-radius: 50%;
  border: 2px solid white;
  position: absolute;
  left: calc(50% - 6px);
  bottom: -7px;
  z-index: 3;
  transition: all .2s ease-in-out;
}
.progressBar a:first-child:before {
  left: 0;
}
.progressBar a:last-child:before {
  right: 0;
  left: auto;
}
.progressBar a > li > span {
  transition: opacity .3s ease-in-out;
}
.progressBar a:not(.is-active) li > span {
  opacity: 0;
}
.progressBar .is-complete:not(:first-child):after,
.progressBar .is-active:not(:first-child):after {
  content: "";
  display: block;
  width: 100%;
  position: absolute;
  bottom: -2px;
  left: -50%;
  z-index: 2;
  border-bottom: 2px solid #c02626;
}
.progressBar a:last-child li > span {
  width: 200%;
  display: inline-block;
  position: absolute;
  left: -100%;
}

.progressBar .is-complete:last-child:after,
.progressBar .is-active:last-child:after {
  width: 200%;
  left: -100%;
}

.progressBar .is-complete:before {
  background-color: #c02626;
}

.progressBar .is-active:before,
.progressBar a:hover:before,
.progressBar .is-hovered:before {
  background-color: white;
  border-color: #c02626;
}
.progressBar a:hover:before,
.progressBar .is-hovered:before {
  transform: scale(1.33);
}

.progressBar a:hover li > span,
.progressBar a.is-hovered li > span {
  opacity: 1;
}

.progressBar:hover a:not(:hover) li > span {
  opacity: 0;
}
.progress-card {
    border-radius: 60px!important;
    border: none!important;
}
.card-header {
  color: #c02626;
  background: oldlace;
}
.bg-orange{
  color: oldlace!important;
  background: #c02626!important;
}
    </style>

</head>
<body class="hold-transition sidebar-mini over">
<div class="wrapper">

    @include('admin.section.navbar')
    
    @include('admin.section.sidebar')

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Order Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Show Details</li>
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
        <div class="container-fluid">
          <div class="row justify-content-center mb-5">
            <div class="col-md-3 col-6 col-lg-3 col-sm-3 p-0">
              <div class="card mb-1 progress-card">
                <div class="card-header progress-card bg-orange">
                  <h5 class="m-0 text-center">Order Status</h5>
                </div>
              </div>
            </div>
            <div class="col-md-12 p-0">
                <div class="card progress-card shadow">
                    <div class="card-body">  
                        <ol class="progressBar">
                        @foreach ($statuses as $status)
                            <a href="/updateStatus/{{$order->id}}/{{$status->id}}" class="@if($order->orderstatus_id == $status->id) is-active @elseif($order->orderstatus_id > $status->id) is-complete @endif"><li><span>{{$status->name}}</span></li></a>  
                        @endforeach
                        </ol>
                    </div>
                </div>
                    
            </div>
            
            <div class="col-md-6 p-2">
              <div class="card">
                <div class="card-header p-2">
                  <h5 class="m-0 text-center"><img src="{{url('/img/icon/order.png')}}" height="30" width="30"> Order Details</h5>
                </div>
                <div class="card-body">
                  <table class="table table-hover" style="width: 100%">
                    <tr>
                      <th>Order Id :</th>
                      <td>order_{{$order->transaction->order_id ?? ''}}</td>
                    </tr>
                    <tr>
                      <th>User Id :</th>
                      <td>{{$order->user_id}}</td>
                    </tr>
                    <tr>
                      <th>Order Status :</th>
                      <td><button class="btn btn-success btn-sm" type="button">Order {{$order->orderstatus->name ?? ''}}</button></td>
                    </tr>
                    <tr>
                      <th>Purchase Date :</th>
                      <td>{{$order->created_at->format('d M Y H:i A')}}</td>
                    </tr>
                  </table>

                </div>
              </div>
            </div>

            <div class="col-md-6 p-2">
              <div class="card">
                <div class="card-header p-2">
                  <h5 class="m-0 text-center"><img src="{{url('/img/icon/payment.png')}}" height="35" width="35"> Payment Details</h5>
                </div>
                <div class="card-body">
                  <table class="table table-hover" style="width: 100%">
                    <tr>
                      <th>Id :</th>
                      <td>{{$order->id}}</td>
                    </tr>
                    <tr>
                      <th>Payment Id :</th>
                      <td>trans_{{$order->transaction->id ?? ''}}</td>
                    </tr>
                    <tr>
                      <th>Payment Method :</th>
                      <td>{{$order->transaction->payment_mode ?? ''}}</td>
                    </tr>
                    <tr>
                      <th>Billing Amount :</th>
                      <td class="text-green">₹ {{$order->amount}}/-</td>
                    </tr>
                    <tr>
                      <th>Payment Date :</th>
                      <td>{{$order->created_at->format('d M Y H:i A')}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-4 p-2">
              <div class="card">
                <div class="card-header p-2">
                  <h5 class="m-0 text-center"><img src="{{url('/img/icon/user.png')}}" height="30" width="30"> User Details</h5>
                </div>
                <div class="card-body">
                  <table class="table table-hover" style="width: 100%">
                    <tr>
                      <th>Name :</th>
                      <td>{{$order->user->name}}</td>
                    </tr>
                    <tr>
                      <th>Mobile :</th>
                      <td><a href="tel:{{$order->user->mobile}}" style="text-decoration: none; color: green">{{$order->user->mobile}}</a></td>
                    </tr>
                    <tr>
                      <th>Email :</th>
                      <td><a href="mailto:{{$order->user->email}}" style="text-decoration: none; color: blue">{{$order->user->email}}</a></td>
                    </tr>
                    <tr>
                      <th>Address :</th>
                      <td>{{$order->user->address}}</td>
                    </tr>
                    <tr>
                      <th>City :</th>
                      <td>{{$order->user->city}}</td>
                    </tr>
                    <tr>
                      <th>Pincode :</th>
                      <td>{{$order->user->pincode}}</td>
                    </tr>
                  </table>

                </div>
              </div>
            </div>

            <div class="col-md-8 p-2">
              <div class="card">
                <div class="card-header p-2">
                  <h5 class="m-0 text-center"><img src="{{url('/img/icon/product.png')}}" height="30" width="30"> Product Details</h5>
                </div>
                <div class="card-body">
                  <table class="table table-hover table-responsive" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    @foreach ($purchasers as $purchaser)
                    {{-- @if ($purchaser->user_id == $order->user->id && $order->id == $purchaser->order_id)     --}}
                    <tr>
                      <td>{{$purchaser->product->name}}</td>
                      <td>{{$purchaser->product->description}}</td>
                      <td class="d-flex"> @foreach ($purchaser->product->images as $image)<img height="50" width="50" src="/images/{{$image->file}}">@endforeach</td>
                      <td>{{$purchaser->quantity}}</td>
                      <td>₹{{$purchaser->quantity * $purchaser->product->amount}}/-</td>
                    </tr>
                    {{-- @endif --}}
                    @endforeach
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
@include('admin.script')

</body>
</html>
