@section('page_title', $post->post_title)
@extends('layouts.frontend')

@section('content')

    <h1>{{$post->post_title}}</h1>
    {!!$post->post_content !!}

@endsection