<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Affinito</title>
    <link rel="shortcut icon" type="image/png" href="{{url('/img/icon/favicon.png')}}" />
    <link rel="apple-touch-icon" href="{{url('/img/icon/favicon.png')}}" />
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <script src="https://kit.fontawesome.com/eb7753515e.js" crossorigin="anonymous"></script>
    <!-- CSS 
        ========================= -->
        <!--bootstrap min css-->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        <!--owl carousel min css-->
        <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">
        <!--slick min css-->
        <link rel="stylesheet" href="{{asset('/css/slick.css')}}">
        <!--magnific popup min css-->
        <link rel="stylesheet" href="{{asset('/css/magnific-popup.css')}}">
        <!--font awesome css-->
        <link rel="stylesheet" href="{{asset('/css/font.awesome.css')}}">
        <!--ionicons css-->
        <link rel="stylesheet" href="{{asset('/css/ionicons.min.css')}}">
        <!--linearicons css-->
        <link rel="stylesheet" href="{{asset('/css/linearicons.css')}}">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
        <!--jquery ui min css-->
        <link rel="stylesheet" href="{{asset('/css/jquery-ui.min.css')}}">
        <!--slinky menu css-->
        <link rel="stylesheet" href="{{asset('/css/slinky.menu.css')}}">
        <!--plugins css-->
        <link rel="stylesheet" href="{{asset('/css/plugins.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <style scoped>
            #preloder {
       position: fixed;
       width: 100%;
       height: 100%;
       top: 0;
       left: 0;
       z-index: 999999;
       background: #fff;
   }
   .loader {
       width: 30px;
       height: 30px;
       border: 3px solid #419eaa;
       position: absolute;
       top: 50%;
       left: 50%;
       margin-top: -13px;
       margin-left: -13px;
       border-radius: 60px;
       border-left-color: transparent;
       animation: loader 0.8s linear infinite;
       -webkit-animation: loader 0.8s linear infinite;
       }
   @keyframes loader {
       0% {
           transform: rotate(0deg);
       }
       50% {
           transform: rotate(180deg);
       }
       100% {
           transform: rotate(360deg);
       }
   }
   @-webkit-keyframes loader {
       0% {
           -webkit-transform: rotate(0deg);
       }
       50% {
           -webkit-transform: rotate(180deg);
       }
       100% {
           -webkit-transform: rotate(360deg);
       }
   }
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
       .fade-enter-active,
   .fade-leave-active {
     transition-duration: 0.1s;
     transition-property: opacity;
     transition-timing-function: ease;
   }
   .autocomplete-input {
    border-radius: 20px!important;
    width: 75%!important;

}
[data-position=below] .autocomplete-result-list {
    width: 75%!important;
    top: 115%!important;
    border-radius: 8px 8px 8px 8px!important;
    z-index: 5!important;
}
   .fade-enter-active {
     /* transition-delay: .1s; */
   }
   
   .fade-enter,
   .fade-leave-active {
     opacity: 0;
   }
   .owl-theme .owl-nav .owl-prev, .owl-theme .owl-nav .owl-next {
     visibility: hidden;
   }
  .owl-theme .owl-nav .owl-prev:after {
    visibility: visible;
    content: "\f0a9";
    width: 30px!important;
    height: 30px!important;
    position: absolute!important;
    bottom: 50%!important;
    right: 0!important;
    border-radius: 20px!important;
    display: block !important;
    color: #fff!important;
    background: #c02626!important;
    outline: none!important;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    text-transform: capitalize!important;
    font-family: "FontAwesome";
    font-size: 35px;
}

.owl-theme .owl-nav .owl-next:after {
  visibility: visible;
  content: "\f0a8";
    width: 30px!important;
    height: 30px!important;
    position: absolute!important;
    bottom: 50%!important;
    left: 0!important;
    border-radius: 20px!important;
    display: block !important;
    color: #fff!important;
    background: #c02626!important;
    outline: none!important;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    text-transform: capitalize!important;
    font-family: "FontAwesome";
    font-size: 35px;
}
@if(sizeof($banners))
  @foreach($banners as $banner)
    #banner{{$banner->id}} {
      background-image:url('/images/banners/{{$banner->home}}');
    }
  @endforeach
@endif
       </style>
</head>
<body>
    <div id="app">

    </div>
    <script src="{{mix('/js/app.js')}}"></script>
    <!-- JS
        ============================================ -->
        <!--jquery min js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        {{-- <script src="{{asset('/js/vendor/jquery-3.4.1.min.js')}}"></script> --}}
        <!--popper min js-->
        <script src="{{asset('/js/popper.js')}}"></script>
        <!--bootstrap min js-->
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>
        <!--owl carousel min js-->
        <script src="{{asset('/js/owl.carousel.min.js')}}"></script>
        <!--slick min js-->
        <script src="{{asset('/js/slick.min.js')}}"></script>
        <!--magnific popup min js-->
        <script src="{{asset('/js/jquery.magnific-popup.min.js')}}"></script>
        <!--counterup min js-->
        <script src="{{asset('/js/jquery.counterup.min.js')}}"></script>
        <!--jquery countdown min js-->
        <script src="{{asset('/js/jquery.countdown.js')}}"></script>
        <!--jquery ui min js-->
        <script src="{{asset('/js/jquery.ui.js')}}"></script>
        <!--jquery elevatezoom min js-->
        <script src="{{asset('/js/jquery.elevatezoom.js')}}"></script>
        <!--isotope packaged min js-->
        <script src="{{asset('/js/isotope.pkgd.min.js')}}"></script>
        <!--slinky menu js-->
        <script src="{{asset('/js/slinky.menu.js')}}"></script>
        <!--instagramfeed menu js-->
        {{-- <script src="{{asset('/js/jquery.instagramFeed.min.js')}}"></script> --}}
        <!-- Plugins JS -->
        <script src="{{asset('/js/plugins.js')}}"></script>
        
        <!-- Main JS -->
        <script src="{{asset('/js/main.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/60ab6974bbd5354c0fdbc1d7/1f6ep7sis';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
        <script>

            $(document).ready(function(){
                
                $(".loader").fadeOut(); 
                $("#preloder").delay(400).fadeOut("slow");
        $(document).on('click', '#plus', function () {
           $(this).prev().val(+($(this).prev().val())+1);
        //    console.log($(this).prev().val());
        });
        $(document).on('click', '#minus', function () {
           if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
        });
        
                $(document).on('click', '#add', function (e) {
            e.preventDefault();
            
        //    console.log('hello');
        //    return false;
         $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
          url:"/api/addCart",
          method:"post",
          data: $(this).closest('form').serialize(),

          success:function(response){
              $('#showPlaceorder').show();
            // console.log($(this).prev().prev());
            swal({
              text: "Product Added Successfully",
              icon: "success",  
              timer: 3000,
              buttons:false
            });
          },
          error: function(error){

          }
        });
        return false;
        });
            });
        </script>
</body>

</html>