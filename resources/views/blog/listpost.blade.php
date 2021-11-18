@extends('layoutBlog.content')
@section('isi')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="page-header-bg" style="background-image: url('{{ asset ('public/frontend/img/header-2.jpg') }}');"
        data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
                <h1 class="text-uppercase">Lifestyle</h1>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
<br>
<!-- post -->
<div class="col-md-8">
    @foreach ($collection as $item)
    <div class="post post-row">
        <a class="post-img" href="{{ route('blog.isi', $item->slug ) }}"><img src="{{ asset($item->gambar) }}" alt=""></a>
        <div class="post-body">
            <br>
            <div class="post-category">
                @foreach ($item->hubungkanKeTag as $cacad)
                <a href="category.html">{{ $cacad->name }}</a>
                @endforeach
            </div>
        <h3 class="post-title"><a href="blog-post.html">{{ $item->judul }}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{ $item->user->name }}</a></li>
                <li>{{ $item->created_at->diffForHumans() }}</li>
            </ul>
            {{-- <p>{!! $item->content !!}</p> --}}
        </div>
    </div>
    @endforeach
    <div class="text-center">
        {{ $collection->links() }}
    </div>
</div>
<!-- /post -->
@endsection


