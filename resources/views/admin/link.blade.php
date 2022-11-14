
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  
    <title>Admin panel</title>
    <link rel="shortcut icon" type="image/png" href="{{url('/img/icon/favicon.png')}}" />
    <link rel="apple-touch-icon" href="{{url('/img/icon/favicon.png')}}" />
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb7753515e.js" crossorigin="anonymous"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> --}}
    {{-- <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"> --}}
    <!-- Google Font: Source Sans Pro -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/api/sum().js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
    <script>
      $(document).ready(function(){
          $('.imgerror').delay(8000).fadeOut(); 
      });
    </script>
    <style>
      body::-webkit-scrollbar-thumb {
        background: darkgray;
      }

      body::-webkit-scrollbar-track {
  
      background: transparent;
      }

      body::-webkit-scrollbar {
        transition: all .5s;
        width: 5px;
        height: 1px;
        border-radius: 20px;
      }

      body::-webkit-scrollbar-thumb {
        background: #c02626;
      }
      table::-webkit-scrollbar-thumb {
        background: darkgray;
      }

      table::-webkit-scrollbar-track {
  
      background: transparent;
      }

      table::-webkit-scrollbar {
        transition: all .5s;
        width: 5px;
        height: 10px;
      }

      table::-webkit-scrollbar-thumb {
        background: #c02626;
        border-radius: 20px;
      }
      .sidebar::-webkit-scrollbar-thumb {
        background: darkgray;
      }

      .sidebar::-webkit-scrollbar-track {
  
      background: transparent;
      }

      .sidebar::-webkit-scrollbar {
        transition: all .5s;
        width: 5px;
        height: 1px;
        border-radius: 20px;
      }

      .sidebar::-webkit-scrollbar-thumb {
        background: #c02626;
        border-radius: 60px;
      }
      .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
      }
      .btn-primary:hover {
            color: #fff;
            background-color: #c02626;
        }
      div.dataTables_wrapper div.dataTables_filter input:focus {
        border-color: #c02626;
        box-shadow: none;
      }
    </style>
  </head>
