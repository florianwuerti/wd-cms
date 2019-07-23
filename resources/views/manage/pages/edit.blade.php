@section('page_title', 'Edit Page')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Page</h1>
            </div>
        </div>
        <hr class="m-t-0">

        @if (session('status'))
            <div class="notification notification-success is-info">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{route('pages.update', $page->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="columns">
                <div class="column is-three-quarters-desktop is-three-quarters-tablet">
                    <div class="field">
                        <label for="page_title" class="label">Page Title:</label>
                        <div class="control">
                            <input type="text" class="input" name="page_title" id="page_title" placeholder="Page Title"
                                   value="{{$page->page_title}}">
                        </div>
                    </div><!-- end of post_title field -->

                    <div class="field">
                        <label for="page_content" class="label">Page Content:</label>
                        <div class="control">
                            <textarea id="laraberg" name="page_content" hidden>{{$page->lb_raw_content}}</textarea>
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
                                <div class="author">

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
                                    <p>{{Carbon\Carbon::parse($page->published_at)->format('D d, M. Y g:i A')}}</p>
                                    <h4><span class="status-emphasis">Updated</span></h4>
                                    <p>{{Carbon\Carbon::parse($page->updated_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="publish-buttons-widget widget-area">
                            @if($page->post_status == 1)
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
                            @elseif($page->post_status == 3)
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
                        <div class="collapse card">
                            <div class="collapse-trigger">
                                <div role="button" aria-controls="contentIdForA11y3" class="card-header">
                                    <p class="card-header-title">Page Attributes</p>
                                    <a class="card-header-icon">
                                        <span class="icon"><i class="mdi mdi-menu-down mdi-24px"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div id="contentIdForA11y3" aria-expanded="true" class="collapse-content">
                                <div class="card-content">
                                    <div class="content">
                                        <div class="field is-horizontal">
                                            <div class="control">
                                                <div class="field">
                                                    <label for="page_order" class="label">Order</label>
                                                    <input class="input m-b-5" name="page_order" type="number"
                                                           value="{{$page->menu_order}}" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-widget m-t-20" aria-id="contentIdForA11y3">
                        <collapsecardthumbnail
                                v-bind:src="{{json_encode(asset('/uploads/images/' . $page->page_thumbnail ))}}"></collapsecardthumbnail>
                    </div>
                </div>
            </div>
        </form>
    </div> <!-- end of .flex-container -->


@endsection

@section('scripts')

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                rolesSelected: false,
            }
        });

        Laraberg.init('laraberg', { sidebar: true, laravelFilemanager: true })
    </script>

@endsection