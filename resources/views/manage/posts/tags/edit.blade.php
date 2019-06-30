@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Tag</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <form action="{{route('tags.update', $tag->id)}}" method="POST">

            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="columns">
                <div class="column">

                    <div class="field">
                        <label for="tag_name" class="label">Tag name:</label>
                        <div class="control">
                            <input id="tag_name" name="tag_name" class="input" type="text" value="{{$tag->name}}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="tag_slug" class="label">Tag Slug:</label>
                        <div class="control">
                            <input id="tag_slug" name="tag_slug" class="input" type="text" value="{{$tag->slug}}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="tag_description" class="label">Tag Description</label>
                        <div class="control">
                            <textarea id="tag_description" name="tag_description" class="textarea"
                                      placeholder="{{$tag->description}}"></textarea>
                        </div>
                    </div>

                </div> <!-- end of .column -->

                <div class="column is-one-quarter-desktop is-narrow-tablet">
                    <div class="card card-widget">
                        <div class="post-status-widget widget-area">
                            <div class="status">
                                <div class="status-icon">
                                    <span class="icon is-large"><i class="fas fa-save fa-2x"></i></span>
                                </div>
                                <div class="status-details">
                                    <h4>Saved</h4>
                                    <p>A Few Minutes Ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="publish-buttons-widget widget-area">
                            <div class="secondary-action-button">
                                <editdeletemodal route="{{route('tags.destroy', $tag->id)}}"
                                             tagname="{{$tag->name}}"></editdeletemodal>
                            </div>
                            <div class="primary-action-button">
                                <button type="submit" name="tag_updated" value="tag_updated"
                                        class="button is-primary is-fullwidth">Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div> <!-- end of .flex-container -->
@endsection