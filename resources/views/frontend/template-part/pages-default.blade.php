@section('page_title', $page->page_title)
@extends('layouts.frontend')

@section('content')

    <h1>{{$page->page_title}}</h1>
    {!! $page->page_content !!}

@endsection