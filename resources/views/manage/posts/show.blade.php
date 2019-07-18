@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Show Post: {{ $post->post_title }}</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                {!! $post->lb_content !!}
            </div> <!-- end of .column -->
        </div>

    </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
    <script>
        let content = Laraberg.getContent();
        console.log(content);
    </script>
@endsection