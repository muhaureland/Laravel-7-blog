{{-- @include('layoutBlog.header')
<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('isi')
                </div>
                @include('layoutBlog.widged')
            </div>
        </div>
		<!-- /container -->
    </div>
<!-- /SECTION -->
@include('layoutBlog.footer') --}}

@include('layoutBlog.header')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @yield('isi')
            @include('layoutBlog.widget')
         </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@include('layoutBlog.footer')
