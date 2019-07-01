@section('page_title', 'Create Users')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create new Posts</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="columns">
                        <div class="column is-three-quarters-desktop is-three-quarters-tablet">
                            <div class="field">
                                <label for="post_title" class="label">Post Title:</label>
                                <div class="control">
                                    <input type="text" class="input" name="post_title" id="post_title"
                                           placeholder="Post Title">
                                </div>
                            </div><!-- end of post_title field -->

                            <div class="field">
                                <label for="post_content" class="label">Post Content:</label>
                                <div class="control">
                            <textarea class="textarea" name="post_content" id="post_content" placeholder="Post Content"
                                      rows="10"></textarea>
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
                                <div class="post-status-widget widget-area">
                                    <div class="status">
                                        <div class="status-icon">
                                            <span class="icon is-large"><i class="fas fa-save fa-2x"></i></span>
                                        </div>
                                        <div class="status-details">
                                            <h4>Visibility: <span class="status-emphasis">Public</span></h4>
                                            <h4>Publish: <span class="status-emphasis">Immediately</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="publish-buttons-widget widget-area">
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
                                            <tags :value="{{json_encode($tags)}}"></tags>
                                        </div>
                                    </div>
                                </b-collapse>
                            </div>

                            <div class="card card-widget m-t-20">
                                <b-collapse class="card" aria-id="contentIdForA11y3">
                                    <div slot="trigger" slot-scope="props" class="card-header" role="button"
                                         aria-controls="contentIdForA11y3">
                                        <p class="card-header-title">Categories</p>
                                        <a class="card-header-icon">
                                            <b-icon :icon="props.open ? 'menu-down' : 'menu-up'"></b-icon>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <div class="content">
                                            <input type="hidden" name="categories" :value="rolesSelected" {{old('rolesSelected')}}/>

                                            @foreach ($categories as $category)
                                                <div class="field">
                                                    <b-checkbox v-model="rolesSelected"
                                                                :native-value="{{$category->id}}">{{$category->name}}</b-checkbox>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </b-collapse>
                            </div>

                            <div class="card card-widget m-t-20" aria-id="contentIdForA11y3">
                                <collapsecardthumbnail></collapsecardthumbnail>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection

@section('scripts')

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                rolesSelected: '',
            }
        });
    </script>

@endsection