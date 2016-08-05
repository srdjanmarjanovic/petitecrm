<!-- Content Header (Page header) -->
<section class="content-header">

    <div class="row">
		<div class="col-md-5">
	        <h1 class="page-title">
		        @yield('contentheader_title', 'Page Header here')
		        <small>@yield('contentheader_description')</small>
		    </h1>
		</div>
		<div class="col-md-7">
        	@yield('section-one')
		</div>
    </div>
</section>