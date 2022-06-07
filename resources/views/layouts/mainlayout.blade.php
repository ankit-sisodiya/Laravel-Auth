<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
    <head>
    <meta charset="utf-8" />
    <title>Dashboard | PHPPOETS - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
		<title>@yield('title')</title>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/img/logo7.png') }}">
    @include('layouts.partials.head')
  </head>
  <body>
    <!-- Main Wrapper -->
    <?php $user = Auth::user(); ?>
	
	@include('layouts.partials.header')
    
	@include('layouts.partials.nav')     

	@yield('content')	
	


<!-- /Main Wrapper -->
@include('layouts.partials.footer-scripts')

 </body>
</html>