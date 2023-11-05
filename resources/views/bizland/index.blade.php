<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gadgetek POS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/theme/assets/img/servxlogo.png" rel="icon">
  <link href="public/theme/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/theme/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/theme/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="public/theme/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/theme/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="public/theme/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="public/theme/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="public/theme/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
<style>
    .icon-box{
        
        border: 1px solid slateblue;
           .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
    }
    
    
    .carousel-item img{

    height: 650px;
    width: 100%;
    object-fit: cover; // here

     
    }
  
</style>
  <!-- =======================================================
  * Template Name: BizLand - v1.2.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:gadgetekbahamas@gmail.com">gadgetekbahamas@gmail.com</a>
       
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="index.html">BizLand<span>.</span></a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="#" class="logo mr-auto">
           <img src="public/theme/assets/img/servxlogo.png" alt="">
           <!--<img src="https://posdemo.gadgetekpos.website/uploads/Imaglogo2-1.png" alt="">-->
           </a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#pricing">Pricing</a></li>
           <li><a href="#services">Features</a></li>
          <li><a href="#faq">FAQ's</a></li>
           <li><a href="#contact">Contact</a></li>
          <li><a href="https://gadgetekpos.website/business/register">Sign Up</a></li>
          <li><a href="https://gadgetekpos.website/login">Login</a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="" class="" style='margin-top: 41px;'>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href='https://gadgetekpos.website/business/register' target='_blank'><img src="{{URL::asset('theme/1.jpg')}}" alt="Los Angeles"  class="img-fluid">
      </a>
    </div>
    <div class="carousel-item">
     <a href='https://gadgetekpos.website/business/register' target='_blank'> <img src="{{URL::asset('theme/2.jpg')}}" alt="Chicago" class="img-fluid">
     </a>
    </div>
    <div class="carousel-item">
    <a href='https://gadgetekpos.website/business/register' target='_blank'>  <img src="{{URL::asset('theme/3.jpg')}}" alt="New York"  class="img-fluid">
    </a>
    </div>
    
    <div class="carousel-item">
    <a href='https://gadgetekpos.website/business/register' target='_blank'>  <img src="{{URL::asset('theme/4.jpg')}}" alt="New York"  class="img-fluid">
    </a>
    </div>
    
    <div class="carousel-item">
    <a href='https://gadgetekpos.website/business/register' target='_blank'>  <img src="{{URL::asset('theme/5.jpg')}}" alt="New York"  class="img-fluid">
    </a>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <!-- End Featured Services Section -->


    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <h3>Check our <span>Pricing</span></h3>
        
        </div>

        <div class="row">

         <!-- <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>-->
@foreach ($packages as $package)

    <div class="col-md-4">
    	
		<div class="box box-success hvr-grow-shadow">
			<div class="box-header with-border text-center">
				<h2 class="box-title">{{$package->name}}</h2>
			</div>
			
			<!-- /.box-header -->
			<div class="box-body text-center">

				<i class="fa fa-check text-success"></i>
				@if($package->location_count == 0)
					@lang('superadmin::lang.unlimited')
				@else
					{{$package->location_count}}
				@endif

				@lang('business.business_locations')
				<br/><br/>

				<i class="fa fa-check text-success"></i>
				@if($package->user_count == 0)
					@lang('superadmin::lang.unlimited')
				@else
					{{$package->user_count}}
				@endif

				@lang('superadmin::lang.users')
				<br/><br/>

				<i class="fa fa-check text-success"></i>
				@if($package->product_count == 0)
					@lang('superadmin::lang.unlimited')
				@else
					{{$package->product_count}}
				@endif

				@lang('superadmin::lang.products')
				<br/><br/>

				<i class="fa fa-check text-success"></i>
				@if($package->invoice_count == 0)
					@lang('superadmin::lang.unlimited')
				@else
					{{$package->invoice_count}}
				@endif

				@lang('superadmin::lang.invoices')
				<br/><br/>

				@if(!empty($package->custom_permissions))
					@foreach($package->custom_permissions as $permission => $value)
						@isset($permission_formatted[$permission])
							<i class="fa fa-check text-success"></i>
							{{$permission_formatted[$permission]}}
							<br/><br/>
						@endisset
					@endforeach
				@endif

				@if($package->trial_days != 0)
					<i class="fa fa-check text-success"></i>
					{{$package->trial_days}} @lang('superadmin::lang.trial_days')
					<br/><br/>
				@endif
				
				<h3 class="text-center">
				@php
					$interval_type = !empty($intervals[$package->interval]) ? $intervals[$package->interval] : __('lang_v1.' . $package->interval);
				@endphp
					@if($package->price != 0)
						<span class="display_currency" data-currency_symbol="true">
							${{round($package->price)}}
						</span>

						<small>
							/ {{$package->interval_count}} {{$interval_type}}
						</small>
					@else
						@lang('superadmin::lang.free_for_duration', ['duration' => $package->interval_count . ' ' . $interval_type])
					@endif
				</h3>
			</div>
			<!-- /.box-body -->

			<div class="box-footer bg-gray disabled text-center">
				@if($package->enable_custom_link == 1)
					<a href="{{$package->custom_link}}" class="btn btn-block btn-success">{{'Register & Subscribe'}}</a>
				@else
				
					@if(isset($action_type) && $action_type == 'register')
						<a href="{{ route('business.getRegister') }}?package={{$package->id}}" 
						class="btn btn-block btn-success">
		    				@if($package->price != 0)
		    					@lang('superadmin::lang.register_subscribe')
		    				@else
		    					@lang('superadmin::lang.register_free')
		    				@endif
	    				</a>
					@else
	    				<a href="{{action('\Modules\Superadmin\Http\Controllers\SubscriptionController@pay', [$package->id])}}" 
						class="btn btn-block btn-success">
		    				@if($package->price != 0)
		    					@lang('superadmin::lang.pay_and_subscribe')
		    				@else
		    					@lang('superadmin::lang.subscribe')
		    				@endif
	    				</a>
					@endif
				@endif

    			{{$package->description}}
			</div>
		</div>
		<!-- /.box -->
    </div>
    @if($loop->iteration%3 == 0)
    	<div class="clearfix"></div>
    @endif
@endforeach



       

        </div>

      </div>
    </section><!-- End Pricing Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Frequently Asked <span>Questions</span></h3>
         
        </div>

       <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Why should I switch to Gadgetek POS Cloud POS and what are its benefits ?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="card-block">
                   Gadgetek pos will allow users to manage their business from anywhere and in real time, if your at work, home or on the go, you can stay connected to your business.. 
                </div>
            </div>
        </div>
       
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">How can Gadgetek POS help me with my business?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="card-block">
                   With Gadgetek POS you can track inventory, sales, reports and more, you can monitor all transactions in real time to make the best decisions for your business.
                </div>
            </div>
        </div>

       
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">What happens if I failed to renew my subscriptions?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="card-block">
                   Your account will be suspended untill users subscribed to a new plan, suspended plans will be held for 3 months and backed up for pending reactivation.
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Can we use the system when there is no internet connection?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="card-block">
                   Gadgetek pos uses your internet connection, loss of internet will not loose any data but will suspend activities untill internet is restored.
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Can I have a single login with my multiple stores?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="card-block">
                    yes, your login can be connected with multiple stores.
                    <br>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">What is The hardware requirement to use Gadgetek POS?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="card-block">
                  Gadgetek pos hardware includes but not limited to, Tablets/Laptops/Desktop Computers, Barcode scanners, Receipt printers, Cash drawers/keyboars and Mouse
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">How stable is your server and what happens if the server running Gadgetek POS faces a virus problem or if the server crashes?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="card-block">
                   Gadgetek pos Servers are based in the U.S and are backed with additional proxy servers to reduce any downtime of server failure.
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Where is my data stored In Gadgetek POS and is it safe?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="card-block">
                  All client data is stored on dedicated servers and encrypted.
                </div>
            </div>
        </div>


        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">What type of training support do you provide for customers?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="card-block">
                   Gadgetek provides online support, onlice customer service as well as on sight training (on sight training is based on country and location)
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">How do you provide tech support?</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="card-block">
                   Gadgetek provides remote access support as well as online support.
                </div>
            </div>
        </div>   
        
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven1">Where and how can we ask for support should we have questions or concerns with the system?</a>
                </h4>
            </div>
            <div id="collapseSeven1" class="panel-collapse collapse">
                <div class="card-block">
                all queries or questions can be submitted using our ticket support platform or via email or whatsapp contact.
                </div>
            </div>
        </div>
        
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven2">What about browser compatibility? Which browsers are supported?</a>
                </h4>
            </div>
            <div id="collapseSeven2" class="panel-collapse collapse">
                <div class="card-block">
               All browser support Gadgetek pos view however we recommend google chrome when setting up printing features.
                </div>
            </div>
        </div>
           

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= About Section ======= -->
   <!-- End About Section -->

    <!-- ======= Skills Section ======= -->
 <!-- End Skills Section -->

   

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Features</h2>
          <h3>Check our <span>Features</span></h3>

        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Multiple Business/Shops</a></h4>
        
                 <ul>
                      <li>Set up multiple businesses in the application.</li> 
                      <li>No restriction on numbers of businesses.</li> <li>Inventory & accounting information is kept separately for each business</li>
                 .
                 </ul>
                 
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Add Locations</a></h4>
              <ul><li>Create multiple locations for your business/shop</li> <li>Manage all of them at the same time.</li> <li>Stocks, Purchases, Sell can be tracked differently for locations.</li> <li>Customize invoice layout, invoice scheme for each location.</li></ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Products</a></h4>
              <ul>
                  <li>Manage Single & Variable products.</li> 
                  <li>Classify products according to Brands, Category, Sub-Category.</li> 
                  <li>Add products having different units</li> 
                 <li> Add SKU number or auto-generate SKU number with prefixes.</li> </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Purchases</a></h4>
              <ul>
                  <li>Easily add purchases.</li> 
                  <li>Add purchase for different locations.</li> 
                  <li>Manage Paid/Due purchases.</li> 
                  <li>Get Notified of Due purchases week before the pay date.</li>
                  <li>Add discounts & Taxes</li>
                  
                  </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Sells</a></h4>
              <ul>
                  <li>Simplified interface for selling products</li> 
                  <li>Default Walk-In-Customer automatically added to a business</li> 
                  <li>Add new customer from POS screen.</li>
                  <li>Ajax based selling screen – save reloading time</li> 
                  <li>Mark an invoice for draft or final Different options for payment</li>
                  <li>Customize invoice layout and invoice sche.</li>
                  
                  </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Manufacturing Management SOlution</a></h4>
              <ul>
                 <li> Manufacturing Services means the manufacturing, quality control, quality assurance</li> 
                  <li>stability testing, packaging, labeling and related services, as contemplated in this Agreement</li>
                  <li>Required to produce Products and from Active Material and Components, and Finished Goods from Products.</li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

  
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <p>Feel free to contact us.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <!--<p> #34 Esguerra Plaza Sgt. Esguerra Ave. South Triangle, Quezon City</p>-->
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>gadgetekbahamas@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>1-242-8083999</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <!--<div class="col-lg-6 ">-->
          <!--  <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>-->
          <!--</div>-->

          <div class="col-lg-6">
            <form action="public/theme/forms/contact.php" method="post" role="form" class="">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              
              <div class="text-center"><button class='btn btn-success' type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3> <img src="public/theme/assets/img/servxlogo.png" alt="" style='width: 130px;'></h3>
            <p>
              <strong>Phone:</strong>1-242-8083999<br>
              <strong>Email:</strong>gadgetekbahamas@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
             <li class="active"><a href="#">Home</a></li>
          <li><a href="#pricing">Pricing</a></li>
           <li><a href="#services">Features</a></li>
          <li><a href="#faq">FAQ's</a></li>
           <li><a href="#contact">Contact</a></li>
          <li><a href="https://gadgetekpos.website/business/register" target='_blank'>Sign Up</a></li>
          <li><a target='_blank' href="https://gadgetekpos.website/login">Login</a></li>
            </ul>
          </div>

         

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p></p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Gadgetek</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://gadgetekpos.website/">Gadgetek POS</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="public/theme/assets/vendor/jquery/jquery.min.js"></script>
  <script src="public/theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/theme/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="public/theme/assets/vendor/php-email-form/validate.js"></script>
  <script src="public/theme/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="public/theme/assets/vendor/counterup/counterup.min.js"></script>
  <script src="public/theme/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="public/theme/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/theme/assets/vendor/venobox/venobox.min.js"></script>
  <script src="public/theme/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="public/theme/assets/js/main.js"></script>

</body>

</html>