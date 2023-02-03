<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.link')
    <style>
        #data-success, #data-error {
            display: none;
        }
        .subCatCss {
          background-color:#07060b;
          border-radius:5px;
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
            <h1 class="m-0 text-dark">Banner Upload</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add Banner</li>
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
        <div class="container mb-5">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="card p-3 shadow">
                @if (session('message'))
                <div class="alert alert-success success-msg">
                    {{ session('message') }}
                </div>
                @endif
                @if (count($errors) > 0)
		            	<div class="alert alert-success imgerror">
		            		<ul>
		            			@foreach ($errors->all() as $error)
		            				<li>{{ $error }}</li>
		            			@endforeach
		            		</ul>
		            	</div>
		            @endif
                <form action="/addImage" method="POST" enctype="multipart/form-data">
                  @csrf
                      <div class="form-group text-center">
                        <h3><b>Upload Banner</b></h3>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label>Banner</label>
                        <input type="file" multiple name="banners[]">
                      </div>                      
                      <hr>
                      <div class="form-group text-center">
                        <button class="btn btn-dark shadow" type="submit">Submit</button>
                      </div>    
                    </form>
              </div>
            </div>
            @if(sizeof($banners))
            <div class="col-md-8">
              <div class="form-row">
                @foreach ($banners as $banner)
                <div class="col-md-6 text-center">
                    <div class="card shadow">
                      <a class="btn btn-light btn-sm shadow" href="/deleteBanner/{{$banner->id}}" style="position: absolute; z-index:1000;top:50%;right:50%"><i class="fas fa-trash text-danger"></i></a>
                      <img height="150" width="auto" style="width: -webkit-fill-available;" src="/images/banners/{{$banner->home}}" alt="">
                    </div>
                  </div>
                  @endforeach
                </div>
            </div>
            @endif
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
    $('#categories').on('change',function(e){
      $.ajaxSetup({
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
      var cat_id = e.target.value;
      
      $.ajax({
        type: "POST",
        url: "/getsubcategory",
        data: {
          id:cat_id
        },
        
        success:function(response) {
          
          $('#subcategory').empty();
          $.each(response[0],function(index,subcat){
            $('#subcategory').append('<div class="col-md-4"><div class="form-group shadow-sm text-center mb-1 subCatCss">  <input type="checkbox" name="sub_category_id" value="'+subcat.id+'"> <b>'+subcat.name+'</b></div><div class="form-group '+subcat.id+'"></div></div>');
            $.each(response[1],function(index,subsubcat){
              if(subcat.id == subsubcat.sub_category_id){

                $('.'+subcat.id).append('<p class="mb-0"><input type="checkbox" name="sub_sub_category_id[]" value="'+subsubcat.id+'" class="subsubCat'+subsubcat.id+'"> <span>'+subsubcat.name+'</span></p>')
              }
            });
            // $('#subcategory').append('<option value="'+subcat.id+'">'+subcat.name+'</option>');
          });
          // console.log(response); 
        },
        error: function(error){
          console.log(error)
          
        }
      });
    });
    // $('#subcategory').click(function(e){

    //   $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //               });
    //   var sub_cat_id = e.target.value;

    //   $.ajax({
    //     type: "POST",
    //     url: "/getsubsubcategory",
    //     data: {
    //       id:sub_cat_id
    //     },
        
    //     success:function(response) {
          
    //       $('#subsubcategory').empty();
    //       $.each(response,function(index,subsubcat){
    //         $('#subsubcategory').append('<option value="'+subsubcat.id+'">'+subsubcat.name+'</option>');
    //       });
    //       // console.log(response); 
    //     },
    //     error: function(error){
    //       console.log(error)
          
    //     }
    //   });
    // });

</script>
<script>
  $(document).ready(function() {

  $('.subsubCat6').blur(function() {
    if(this.checked)
      {
        console.log(true);
      }
  });
  });
</script>
</body>
</html>
