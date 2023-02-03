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
            <h1 class="m-0 text-dark">New Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                {!! Form::open(['method'=>'post','action'=>'CategoryController@store','files'=>true]) !!}
        
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control text-capitalize', 'placeholder'=>'Enter Category Name']) !!}
                        
                      </div>
                      <div class="form-group mt-3">

                        {!! Form::label('file', 'Upload Category Image') !!}
                        <i class="fas fa-info-circle text-danger" type="button" data-toggle="tooltip" data-placement="bottom" title="Please Upload image with (300x300) resolution & Maximum Image upload size is 70kb."></i><br>
                        <input type="file" name="files">
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
</script>
</body>
</html>
