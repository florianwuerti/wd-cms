@section('page_title', 'Create Users')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create new Page</h1>
            </div>
        </div>
        <hr class="m-t-0">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        
        <div class="columns">
            <div class="column">
                <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="columns">
                        <div class="column is-three-quarters-desktop is-three-quarters-tablet">
                            <div class="field">
                                <label for="page_title" class="label">Page Title:</label>
                                <div class="control">
                                    <input type="text" class="input" name="page_title" id="page_title"
                                           placeholder="Page Title">
                                </div>
                            </div><!-- end of page_title field -->

                            <div class="field">
                                <label for="page_content" class="label">Laraberg Page Content:</label>
                                <div class="control">
                                    <textarea id="laraberg" name="page_content" hidden></textarea>
                                </div>
                            </div><!-- end of page_content field -->

                        </div><!-- end of .column.is-three-quarters -->
                        <div class="column is-one-quarter-desktop is-narrow-tablet">
                            <div class="card card-widget">
                                <div class="page-status-widget widget-area">
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
                                                name="page_save_draft" value="page_save_draft">Save Draft
                                        </button>
                                    </div>
                                    <div class="primary-action-button">
                                        <button type="submit" class="button is-primary is-fullwidth"
                                                name="page_save_publish"
                                                value="page_save_publish">Publish
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- end of .column.is-one-quarters -->

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

        Laraberg.init('laraberg', {sidebar: true, laravelFilemanager: true})
    </script>

@endsection