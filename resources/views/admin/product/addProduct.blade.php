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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">New Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card p-3 shadow">

                @if (count($errors) > 0)
		            	<div class="alert alert-danger imgerror">
		            		<ul>
		            			@foreach ($errors->all() as $error)
		            				<li>{{ $error }}</li>
		            			@endforeach
		            		</ul>
		            	</div>
		            @endif
                {!! Form::open(['method'=>'post','action'=>'ProductController@store','files'=>true]) !!}
        
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control text-capitalize', 'placeholder'=>'Enter Product Name']) !!}
                        {!! Form::label('desc', 'Description') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control text-capitalize', 'placeholder'=>'Enter product description', 'rows' => '3']) !!}
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                          <label>Quantity</label>
                          <div class="input-group">
                            <input type="number" class="form-control" name="quantity" aria-label="Text input with dropdown button">
                            <div class="input-group-append">
                              <select class="form-control" name="quantity_unit" id="qty">
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                                <option value="ml">ml</option>
                                <option value="litter">litter</option>
                                <option value="piece">piece</option>
                                <option value="carrat">carrat</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                          <label>Amount</label>
                          <div class="input-group">
                            <input type="number" class="form-control" name="amount" aria-label="Text input with dropdown button">
                            <div class="input-group-append">
                              <select class="form-control" name="amount_unit" id="amnt">
                                
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <label>Tags</label>
                        <select class="form-control" name="tag">
                          <option value="">--Select Tag--</option>
                          @foreach ($tags as $tag)  
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
                        </select>
                      </div>
                        <div class="form-group mt-3">

                          {!! Form::label('file', 'Upload Product Image') !!}
                          <i class="fas fa-info-circle text-danger" type="button" data-toggle="tooltip" data-placement="bottom" title="Please Upload image with (300x300) resolution & Maximum Image upload size is 70kb."></i><br>
                          <input type="file" name="file[]" multiple>
                        </div>
                       
                        <hr>
                    <div class="form-group text-center">
                        {!! Form::submit('Submit', ['class'=>'btn btn-dark']) !!}
                    </div>    
                    {!! Form::close() !!}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    //   $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
      $('#addcourse').on('submit', function(e){
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "/storecourse",
          data: $('#addcourse').serialize(),
          
          success:function(response) {
            console.log("success") 
            $("#addcourse")[0].reset(); 
            $('#data-success').show().delay(3000).fadeOut();           
          },
          error: function(error){
            console.log(error)
            $('#data-error').show().delay(3000).fadeOut(); 
          }
        });
      });
    });

    $('#qty').click(function(e){
      // console.log($('#amnt').find("option").val() == e.target.value);
      $('#amnt').empty();
      $('#amnt').append('<option value="'+e.target.value+'">/ '+e.target.value+'</option>');
    });
</script>
</body>
</html>
