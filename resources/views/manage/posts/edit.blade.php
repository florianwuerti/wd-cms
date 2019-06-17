@section('page_title', 'Edit Posts')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Post {{ $post->id }}</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="field">
                        <label for="post_title" class="label">Post Title:</label>
                        <div class="control">
                            <input type="text" class="input" name="post_title" id="post_title" placeholder="Post Title"
                                   value="{{$post->post_title}}">
                        </div>
                    </div><!-- end of post_title field -->

                    <div class="field">
                        <label for="post_content" class="label">Post Content:</label>
                        <div class="control">
                            <textarea class="textarea" name="post_content" id="post_content" placeholder="Post Content"
                                      rows="10">{{$post->post_content}}</textarea>
                        </div>
                    </div><!-- end of post_content field -->

                    <div class="field">
                        <p class="label m-t-20">Post Thumbnail</p>
                        @if(!$post->post_thumbnail)
                            <imgupload></imgupload>
                        @else
                            <imgupload
                                    v-bind:src="{{json_encode(asset('/uploads/images/' . $post->post_thumbnail ))}}"></imgupload>
                        @endif
                    </div><!-- end of email field -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif

                    <button class="button is-link is-pulled-right" style="width: 250px;"><i
                                class="fas fa-save m-r-10"></i> Save Post
                    </button>
                </form>
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection