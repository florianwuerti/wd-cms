@section('page_title', 'Edit Posts')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Post</h1>
            </div>
        </div>
        <hr class="m-t-0">

        @if (session('status'))
            <div class="notification notification-success is-info">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="columns">
                <div class="column is-three-quarters-desktop is-three-quarters-tablet">
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif

                </div><!-- end of .column.is-three-quarters -->
                <div class="column is-one-quarter-desktop is-narrow-tablet">
                    <div class="card card-widget">
                        <div class="author-widget widget-area">
                            <div class="selected-author">
                                <img src="{{asset('/uploads/images/' . $post->author->image )}}"/>
                                <div class="author">
                                    <h4>{{$post->author->display_name}}</h4>
                                    <p class="subtitle">
                                        (Username)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="post-status-widget widget-area">
                            <div class="status">
                                <div class="status-icon">
                                    <span class="icon is-large"><i class="fas fa-save fa-2x"></i></span>
                                </div>
                                <div class="status-details">
                                    <h4><span class="status-emphasis">Pblished</span></h4>
                                    <p>{{Carbon\Carbon::parse($post->published_at)->format('D d, M. Y g:i A')}}</p>
                                    <h4><span class="status-emphasis">Updated</span></h4>
                                    <p>{{Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="publish-buttons-widget widget-area">
                            @if($post->post_status == 1)
                                <div class="secondary-action-button">
                                    <button type="submit" class="button is-info is-outlined is-fullwidth"
                                            name="post_save_draft" value="post_save_draft">Save Draft
                                    </button>
                                </div>
                                <div class="primary-action-button">
                                    <button type="submit" class="button is-primary is-fullwidth"
                                            name="post_save_publish"
                                            value="post_save_publish">Publish
                                    </button>
                                </div>
                            @elseif($post->post_status == 3)
                                <div class="secondary-action-button">
                                    <button type="submit" class="button is-primary"
                                            name="post_save_updated" value="post_save_updated">Save Updated
                                    </button>
                                </div>
                            @else
                                <div class="secondary-action-button">
                                    <button type="submit" class="button is-primary"
                                            name="post_save_draft" value="post_save_draft">Save Updated
                                    </button>
                                </div>
                                <div class="primary-action-button">
                                    <button type="submit" class="button is-primary is-fullwidth"
                                            name="post_save_publish"
                                            value="post_save_publish">Publish
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div> <!-- end of .column.is-one-quarters -->

                    <div class="card card-widget m-t-20">
                        <b-collapse class="card" aria-id="contentIdForA11y3">
                            <div slot="trigger" slot-scope="props" class="card-header" role="button"
                                 aria-controls="contentIdForA11y3">
                                <p class="card-header-title">Tags</p>
                                <a class="card-header-icon">
                                    <b-icon :icon="props.open ? 'menu-down' : 'menu-up'"></b-icon>
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <tags :value="{{$tags}}"></tags>
                                </div>
                            </div>
                        </b-collapse>
                    </div>

                    <div class="card card-widget m-t-20" aria-id="contentIdForA11y3">
                        <collapsecardthumbnail
                                v-bind:src="{{json_encode(asset('/uploads/images/' . $post->post_thumbnail ))}}"></collapsecardthumbnail>
                    </div>
                </div>
            </div>
        </form>
    </div> <!-- end of .flex-container -->

@endsection