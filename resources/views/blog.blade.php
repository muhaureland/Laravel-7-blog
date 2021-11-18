@extends('layoutBlog.content')

@section('isi')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
                <!-- post -->
                <div class="post post-thumb">
                    @foreach ($cacad as $item)
                    <a class="post-img" href="{{ route('blog.isi', $item->slug ) }}"><img src="{{ $item->gambar }}"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">{{ $item->category->name }}</a>
                        </div>
                        <h3 class="post-title"><a href="#">{{ $item->judul }}</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">{{ $item->user->name }}</a></li>
                            <li>{{ $item->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <!-- /post -->
            </div>
            <div class="col-md-4 hot-post-right">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('public/frontend/img/hot-post-2.jpg')}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
                                error sit</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('public/frontend/img/hot-post-3.jpg')}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Fashion</a>
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                ullum laboramus persequeris.</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- RECENT POST -->
    <div class="col-md-8">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Recent posts</h2>
                </div>
            </div>
            <!-- post -->
            @foreach($data as $post_terbaru)
            <div class="col-md-6">
                <div class="post">
                    <a class="post-img" href="{{ route('blog.isi', $post_terbaru->slug ) }}"><img src="{{ $post_terbaru->gambar }}"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">{{ $post_terbaru->category->name }}</a>
                        </div>
                        <h3 class="post-title"><a href="#">{{ $post_terbaru->judul }}</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">{{ $post_terbaru->user->name }}</a></li>
                            <li>{{ $post_terbaru->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /post -->
        </div>
        <div class="text-center">
            {{ $data->links() }}
        </div>
        <!-- /row -->
    </div>
<!-- /RECENT POST -->
@endsection
