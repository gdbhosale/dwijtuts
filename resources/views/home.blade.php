<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ LAConfigs::getByKey('site_description') }}">
    <meta name="author" content="Dwij IT Solutions">

    <meta property="og:title" content="{{ LAConfigs::getByKey('sitename') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ LAConfigs::getByKey('site_description') }}" />
    
    <meta property="og:url" content="http://laraadmin.com/" />
    <meta property="og:sitename" content="laraAdmin" />
	<meta property="og:image" content="http://demo.adminlte.acacha.org/img/LaraAdmin-600x600.jpg" />
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@laraadmin" />
    <meta name="twitter:creator" content="@laraadmin" />
    
    <title>{{ LAConfigs::getByKey('sitename') }}</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>{{ LAConfigs::getByKey('sitename') }}</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About</a></li>
                <li><a href="#contact" class="smoothScroll">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                @else
                    @if (Auth::user() && Auth::user()->type == "Student")
                        <li><a href="{{ url('/student') }}">{{ Auth::user()->name }}</a></li>
                    @else
                        <li><a href="{{ url(config('laraadmin.adminRoute')) }}">{{ Auth::user()->name }}</a></li>
                    @endif
                    <li><a href="{{ url('/logout') }}">Log out</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>{{ LAConfigs::getByKey('sitename_part1') }} <b><a>{{ LAConfigs::getByKey('sitename_part2') }}</a></b></h1>
                <h3>{{ LAConfigs::getByKey('site_description') }}</h3>
                <h3><a href="{{ url('/login') }}" class="btn btn-lg btn-success">Get Started!</a></h3><br>
            </div>
            <div class="col-lg-2">
                <h5>Amazing Functionalities</h5>
                <p>for Modern Admin Panels</p>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/la-assets/img/arrow1.png') }}">
            </div>
            <div class="col-lg-8">
                <img class="img-responsive" src="{{ asset('/la-assets/img/app-bg.png') }}" alt="">
            </div>
            <div class="col-lg-2">
                <br>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/la-assets/img/arrow2.png') }}">
                <h5>Completely Packaged...</h5>
                <p>for Future expantion of Modules</p>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row centered">
            <h1>An Architecture designed To Excel</h1>
            <br>
            <br>
            <div class="col-lg-4">
                <i class="fa fa-cubes" style="font-size:100px;height:110px;"></i>
                <h3>Modular</h3>
                <p>Making Data Management fast and enjoyable.</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-paper-plane" style="font-size:100px;height:110px;"></i>
                <h3>Easy to Install</h3>
                <p>With single installation command.</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-cubes" style="font-size:100px;height:110px;"></i>
                <h3>Customizable</h3>
                <p>Easy to Manipulation the flows.</p>
            </div>
        </div>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<!-- FEATURES WRAP -->
<div id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 centered">
                <img class="centered" src="{{ asset('/la-assets/img/mobile.png') }}" alt="">
            </div>

            <div class="col-lg-7">
				<h3 class="feature-title">What is LaraAdmin ?</h3><br>
				<ol class="features">
					<li><strong>CMS</strong> (Content Management System) &#8211; Manages Modules &amp; their Data</li>
					<li>Backend <strong>Admin Panel</strong> &#8211; Data can be used in front end applications with ease.</li>
					<li>A probable <strong>CRM</strong> System &#8211; Can be evolved into a CRM system like <a target="_blank" href="https://www.sugarcrm.com">SugarCRM</a></li>
				</ol><br>

				<h3 class="feature-title">Why LaraAdmin ?</h3><br>
                <ol class="features">
					<li><strong>Philosophy:</strong> Inspired by SugarCRM &amp; based on Advanced <strong>Data Types</strong> like Image, HTML, File, Dropdown, TagInput which makes developers job easy. See more in <a target="_blank" href="http://laraadmin.com/features">features</a></li>
					<li>Superior <strong>CRUD generation</strong> for Modules which generates Migration, Controller, Model and Views with single artisan command and integrates with Routes as as well.</li>
					<li><strong>Form Maker</strong> helper is provided for generating entire form with single function call with module name as single parameter. It also gives you freedom to customise form for every field by providing method to generate single field with parameters for customisations.</li>
					<li><b>Upload Manager </b>manages project files &amp; images which are integrated with your Module fields.</li>
					<li><strong>Menu Manager</strong> creates menu with Modules &amp; Custom Links likes WordPress</li>
					<li><strong>Online Code Editor</strong> allows developers to customise the generated Module Views &amp; Files.</li>
				</ol>
            </div>
        </div>
    </div><!--/ .container -->
</div><!--/ #features -->

<section id="contact" name="contact"></section>
<div id="footerwrap">
    <div class="container">
        <div class="col-lg-5">
            <h3>Contact Us</h3><br>
            <p>
				Dwij IT Solutions,<br/>
				Web Development Company in Pune,<br/>
                B4, Patang Plaza Phase 5,<br/>
                Opp. PICT College,<br/>
                Katraj, Pune, India - 411046
            </p>
			<div class="contact-link"><i class="fa fa-envelope-o"></i> <a href="mailto:hello@laraadmin.com">hello@laraadmin.com</a></div>
			<div class="contact-link"><i class="fa fa-cube"></i> <a href="http://laraadmin.com">laraadmin.com</a></div>
			<div class="contact-link"><i class="fa fa-building"></i> <a href="http://dwijitsolutions.com">dwijitsolutions.com</a></div>
        </div>

        <div class="col-lg-7">
            <h3>Register here..</h3>
            <br>
           <form role="form" id="student-register-form" action="{{ url('register') }}" class="smart-form" novalidate="novalidate" method="post">
				{{ csrf_field() }}
                <input type="hidden" name="reg_type" value="STUDENT">
                <div class="row">
					<div class="col-lg-6">
                        <div class="form-group">
                            <label for="name1">Name</label>
                            <input type="name" name="name" class="form-control" id="name1" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="tel" class="form-control" placeholder="Mobile" name="mobile" id="mobile" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email1">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value=""/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="college">College</label>
                             <input type="text" class="form-control" placeholder="College Name" name="college" id="college" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="college">Degree</label>
                            <input type="text" class="form-control" placeholder="Degree Name" name="degree" id="degree" value=""/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" placeholder="City" name="city" id="city" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Retype password</label>
                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" id="password_confirmation"/>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
            </form>
            @if($errors) 
                @foreach ($errors->all() as $error)
                    <div style="color:red;">{{ $error }}</div>
                @endforeach
			@endif
        </div>
    </div>
</div>
<div id="c">
    <div class="container">
        <p>
            <strong>Copyright &copy; 2016. Powered by <a href="https://dwijitsolutions.com"><b>Dwij IT Solutions</b></a>
        </p>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@push('styles')
@endpush


@push('scripts')
<script>

var categories_arr = [
	@foreach($colleges as $college)
		"{{ $college->name }}",
	@endforeach
];
	
$('.carousel').carousel({
    interval: 3500
})

$(document).ready(function() {
    $("#college").autocomplete({
		source: colleges_arr
	});	

    $('#student-register-form').validate({
        rules : {
            name:{required : true, maxlength: 255},
            mobile:{required : true, maxlength: 255},
            email:{required : true, email : true, unique : true, maxlength: 255},
            college:{required : true, maxlength: 255},
            degree:{required : true, maxlength: 255},
            city:{required : true, maxlength: 255},
            password:{required : true, minlength: 6},
            password_confirmation:{required : true, same:password, minlength: 6}
        },
        messages : {
            name:{required : 'Please enter name'},
            mobile:{required : 'Please enter mobile'},
            email:{required : 'Please enter email'},
            college:{required : 'Please enter college'},
            degree:{required : 'Please enter degree'},
            city:{required : 'Please enter city'},
            password:{required : 'Please enter password'},
            password_confirmation:{required : 'Please enter password'}
        },
        errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
        }
    });
});
</script>
@endpush
</body>
</html>
