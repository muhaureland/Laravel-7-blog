@extends('layoutBlog.content')
@section('isi')
<div class="col-md-8">
    <div class="section-row">
        @foreach ($collection as $item)
        <h3>{{ $item->judul }}</h3>
        <figure class="pull-right">
            <img src="{{ asset($item->gambar) }}" style="height: 500px; width: 790px;">
            <figcaption>Lorem ipsum dolor sit amet, mea ad idque detraxit,</figcaption>
        </figure>
        <blockquote class="blockquote">
            <p><footer class="blockquote-footer">{{$item->created_at->diffForHumans().' oleh '.$item->user->name}}</footer>{!! $item->content !!}</p>
        </blockquote>
        @endforeach
    </div>
</div>
@endsection
