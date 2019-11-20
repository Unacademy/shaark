@extends('layouts.app')

@push('meta')
    <meta name="description" content="{{ Str::limit($album->content, 130) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $album->title }}">
    <meta property="og:url" content="{{ $album->permalink }}">
    <meta property="og:description" content="{{ Str::limit($album->content, 130) }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <album-card :single="true" :album="{{ json_encode(\App\Http\Resources\AlbumResource::make($album)) }}"></album-card>
            <comments :id="{{ $album->post->id }}"
                      @if(auth()->check()):user="{{ auth()->user()->id }}" @endif
                      :allow-guest="true"
            ></comments>
        </div>
    </div>
</div>
@endsection
