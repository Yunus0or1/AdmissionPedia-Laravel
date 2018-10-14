<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>Admissionpedia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrapMain.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/materialize.min.css')}}" rel="stylesheet">
    <style type="text/css">
        .caret{
            border-top: 0px;
            margin-right: 1%; 
        }
        h4{
            line-height: 50%;
        }

        a:hover{
            text-decoration: none;
        }
    
 body
 {
   {{--  background-color: #222930;  --}}
      background-color: #E4E4E4;
 }

    </style>  

</head>
 
<body>

<header>
    <nav>
          <div class="nav-wrapper cyan darken-4">
     {{-- <a href="#" class="brand-logo center">ADDMISSION PEDIA</a> --}}
           
           <h1 style="color: #ffffff; font-family: 'Droid serif', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 44px; margin: 0 0 12px; text-align: center;">Addmission pedia</h1>

          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i>menu</a>
        </div>
    </nav>
 


</header>




<div class="container-fluid">

	<div class="row">
	    
       <div class="col-md-offset-3 col-md-6 col-md-offset-3">
            <br>
            @if(Session::has('message'))
            <div class="alert alert-success" style="text-align:center;">
                {{Session::get('message')}}
            </div>
            @endif    
       </div>   
		

	</div>

    <div class="row">
        <div class="col-md-2">
                
        </div>



        <div class="col-md-8">
            @yield('form')
        </div>

        <div class="col-md-2">
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @yield('varsity')
        </div>
    </div>

         <div class="row">
        <div class="col-md-12">
            @yield('test')
        </div>
    </div>
	
	<div class="row">
        <div class="col-md-12">
            @yield('out_of_date')
        </div>
    </div>

        <div class="row">
        <div class="col-md-12">
            @yield('non_selected_varsity')
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            @yield('unit')
        </div>

        <div class="col-md-3">
            <div class="info">
                @yield('price')
            </div>    
        </div>
        <div class="col-md-3">
            @yield('exam_date')
        </div>
        <div class="col-md-3">
            @yield('dayTime')
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            @yield('dept')
        </div>
        <div class="col-md-6">
            @yield('deptSeat')       
        </div>
        <div class="col-md-10">
            @yield('deptReq')
        </div>
        <div class="col-md-6">
            @yield('non_selected_dept')
    </div>
    <div class="col-md-6">
            @yield('non__dept_seat')
    </div>

</div>
</div>





<div class="container">
	@yield('footer')
</div>
<!-- javascript -->
	<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script> 
      <!-- //<script src="{{asset('css/bootstrapMain.min.js')}}"></script> -->
      <script>
            $(document).ready(function() {
                $('select').material_select();
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });
                $('.tooltipped').tooltip({delay: 30});
            });
      </script>

</body>
</html>
