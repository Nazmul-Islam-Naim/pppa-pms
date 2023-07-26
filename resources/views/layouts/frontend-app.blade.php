<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Public Private Partnership Authority</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
		{!!Html::style('custom/website/fonts/font-awesome.min.css')!!}
		{!!Html::style('custom/website/fonts/font-family.css')!!}
        
		<!-- Style CSS
		============================================ -->
		{!!Html::style('custom/website/style.css')!!}

		
        <!-- Bootstrap css -->
        {!!Html::style('custom/css/bootstrap.min.css')!!}

		
        <!-- Main css for green -->
        {!!Html::style('custom/website/green-main.css')!!}

		
        <!-- Mega Menu -->
        {!!Html::style('custom/vendor/megamenu/css/megamenu.css')!!}

        <!-- Search Filter JS -->
        {!!Html::style('custom/vendor/search-filter/search-filter.css')!!}
        {!!Html::style('custom/vendor/search-filter/custom-search-filter.css')!!}
        
		<!-- Modernizr JS
		============================================ -->
		{!!Html::script('custom/website/js/vendor/modernizr-2.8.3.min.js')!!}		

		<!-- Data Tables -->
        {!!Html::style('custom/vendor/datatables/dataTables.bs4.css')!!}
        {!!Html::style('custom/vendor/datatables/dataTables.bs4-custom.css')!!}
        {!!Html::style('custom/vendor/datatables/buttons.bs.css')!!}
    </head>

<body>

    @include('website.includes.header')
    <div>
    @yield('content')
    </div>
    @include('website.includes.footer')

	
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	{!!Html::script('custom/js/jquery.min.js')!!}
	{!!Html::script('custom/js/bootstrap.bundle.min.js')!!}
	{!!Html::script('custom/js/modernizr.js')!!}
	{!!Html::script('custom/js/moment.js')!!}


	<!-- Megamenu JS -->
	{!!Html::script('custom/vendor/megamenu/js/megamenu.js')!!}
	{!!Html::script('custom/vendor/megamenu/js/custom.js')!!}

	<!-- jquery
		============================================ -->	
		{!!Html::script('custom/website/js/vendor/jquery-1.12.4.min.js')!!}	
		
        
		<!-- Popper JS
		============================================ -->	
		{!!Html::script('custom/website/js/popper.js')!!}		
        
		<!-- bootstrap JS
		============================================ -->	
		{!!Html::script('custom/website/js/bootstrap.min.js')!!}	
        
		<!-- bootstrap Toggle JS
		============================================ -->
		{!!Html::script('custom/website/js/bootstrap-toggle.min.js')!!}	
        
        <!-- nivo slider js
		============================================ --> 
		{!!Html::script('custom/website/lib/nivo-slider/js/jquery.nivo.slider.js')!!}	      
		{!!Html::script('custom/website/lib/nivo-slider/home.js')!!}	
		
		<!-- wow JS
		============================================ -->
		{!!Html::script('custom/website/js/wow.min.js')!!}		
        
		<!-- meanmenu JS
		============================================ -->
		{!!Html::script('custom/website/js/jquery.meanmenu.js')!!}		
        
		<!-- Owl carousel JS
		============================================ -->
		{!!Html::script('custom/website/js/owl.carousel.min.js')!!}	
        
		<!-- Countdown JS
		============================================ -->
		{!!Html::script('custom/website/js/jquery.countdown.min.js')!!}
        
		<!-- scrollUp JS
		============================================ -->
		{!!Html::script('custom/website/js/jquery.scrollUp.min.js')!!}		
        
		<!-- Waypoints JS
		============================================ -->
		{!!Html::script('custom/website/js/waypoints.min.js')!!}	
        
		<!-- Counterup JS
		============================================ -->
		{!!Html::script('custom/website/js/jquery.counterup.min.js')!!}	
        
		<!-- Slick JS
		============================================ -->
		{!!Html::script('custom/website/js/slick.min.js')!!}	
        
		<!-- Mix It Up JS
		============================================ -->
		{!!Html::script('custom/website/js/jquery.mixitup.js')!!}	
        
		<!-- Venubox JS
		============================================ -->	
		{!!Html::script('custom/website/js/venobox.min.js')!!}	
        
		<!-- plugins JS
		============================================ -->
		{!!Html::script('custom/website/js/plugins.js')!!}		
 
        
		<!-- main JS
		============================================ -->		
		{!!Html::script('custom/website/js/main.js')!!}		

		
        <!-- Data Tables -->
        {!!Html::script('custom/vendor/datatables/dataTables.min.js')!!}
		
        <!-- Slimscroll JS -->
        {!!Html::script('custom/vendor/slimscroll/slimscroll.min.js')!!}
        {!!Html::script('custom/vendor/slimscroll/custom-scrollbar.js')!!}

        


</body>


</html>
