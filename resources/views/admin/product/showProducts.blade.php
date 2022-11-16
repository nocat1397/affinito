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
        .btn-primary {
          background: #c02626;
          color: #fff;
          border: 1px solid #0000;
        }
        .btn-primary:hover {
          background: #000;
          color: #c02626;
          border: 1px solid #c02626;
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
          <div class="row justify-content-center">
            <div class="col-md-12 p-0">
              <div class="card shadow">
                <div class="card-body table-responsive">
                  <table class="table" style="width: 100%">
                    @if (count($errors) > 0)
		                	<div class="alert alert-danger imgerror">
		                		<ul>
		                			@foreach ($errors->all() as $error)
		                				<li>{{ $error }}</li>
		                			@endforeach
		                		</ul>
		                	</div>
		                @endif
                    <thead style="background-color: #000; color: #c02626; border: 1px solid #c02626">
                      <th>Id</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                      <th>Images</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}} {{$product->quantity_unit}}</td>
                        <td>₹{{$product->amount}}/{{$product->amount_unit}}</td>
                       
                        <td class="d-flex"> @foreach ($product->images as $image)<img height="50" width="50" src="images/{{$image->file}}">@endforeach</td>
                        
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-success btn-sm mr-2" data-toggle="modal" data-backdrop="false" data-target="#modal-{{$product->id}}"><i class="fas fa-edit"></i></button>
                            <a href="{{url('deleteProduct/'.$product->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <div class="modal fade" id="modal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #000; color: #c02626; border: 1px solid #c02626">
                              <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Edit Product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              {!! Form::open(['method'=>'POST','action'=>'ProductController@productChange','files'=>true]) !!}
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Name</label>
                                  <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Description</label>
                                  <textarea type="text" class="form-control" name="description" rows="3">{{$product->description}}</textarea>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                    <label>Quantity</label>
                                    <div class="input-group">
                                      <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                                      <div class="input-group-append">
                                        <select class="form-control" name="quantity_unit">
                                          <option value="{{$product->quantity_unit}}">{{$product->quantity_unit}}</option>
                                          <option value="kg">kg</option>
                                          <option value="gram">gram</option>
                                          <option value="ml">ml</option>
                                          <option value="litter">litter</option>
                                          <option value="piece">piece</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                    <label>Amount</label>
                                    <div class="input-group">
                                      <input type="number" class="form-control" name="amount" aria-label="Text input with dropdown button" value="{{$product->amount}}">
                                      <div class="input-group-append">
                                        <select class="form-control" name="amount_unit">
                                          <option value="{{$product->amount_unit}}">{{$product->amount_unit}}</option>
                                          <option value="kg">kg</option>
                                          <option value="gram">gram</option>
                                          <option value="ml">ml</option>
                                          <option value="litter">litter</option>
                                          <option value="piece">piece</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                {{--  <div class="form-group mt-3">
                                  <label>Tags</label>
                                  <select class="form-control" name="tag">
                                    <option value="">--Select Tag--</option>
                                    <option value="{{$product->tag_id ?? ''}}" selected>{{$product->tag->name ?? ''}}</option>
                                    @foreach ($tags as $tag)  
                                      <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                  </select>
                                </div>  --}}
                                <div class="form-group">
                                  <label>Images</label><br>
                                  @foreach ($product->images as $image)
                                  <div class="img-container">
                                    <img src="/images/{{$image->file}}" height="120" width="120" class="image">
                                    <div class="middle">
                                        <a href="/delete-image/{{$product->id}}/{{$image->id}}" class="text btn btn-danger"><i class="fa fa-trash text-white" aria-hidden="true"></i></a>
                                    </div>
                                  </div>
                                  @endforeach
                                  <br>
                                  <input type="file" name="file[]" multiple>
                                </div>
                                <div class="form-group text-center">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            
                          </div>
                        </div>
                      </div>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script>
    $(document).ready(function(){
      $('.table').DataTable();
      $('form').attr("autocomplete","off");
      $('input').attr("autocomplete","off");
      var i=1;
      $("#add_row").click(function(){b=i-1;
          $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
          $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++; 
      });
      $("#delete_row").click(function(){
        if(i>1){
      $("#addr"+(i-1)).html('');
      i--;
      }
      calc();
    });
    
    $('#tab_logic tbody').on('keyup change',function(){
      calc();
    });
    $('#tax').on('keyup change',function(){
      calc_total();
    });
    
  
  });
  
  function calc()
  {
    $('#tab_logic tbody tr').each(function(i, element) {
      var html = $(this).html();
      if(html!='')
      {
        var qty = $(this).find('.qty').val();
        var price = $(this).find('.price').val();
        $(this).find('.total').val(qty*price);
        
        calc_total();
      }
      });
  }
  
  function calc_total()
  {
    total=0;
    $('.total').each(function() {
          total += parseInt($(this).val());
      });
    $('#sub_total').val(total.toFixed(2));
    tax_sum=total/100*$('#tax').val();
    $('#tax_amount').val(tax_sum.toFixed(2));
    $('#total_amount').val((tax_sum+total).toFixed(2));
  }
</script>
</body>
</html>
