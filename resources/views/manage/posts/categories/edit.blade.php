@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Categorie</h1>
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

        <form action="{{route('categories.update', $category->id)}}" method="POST">

            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="columns">
                <div class="column">

                    <div class="field">
                        <label for="category_name" class="label">Tag name:</label>
                        <div class="control">
                            <input id="category_name" name="category_name" class="input" type="text" placeholder="{{$category->name}}" value="{{$category->name}}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="category_slug" class="label">Tag Slug:</label>
                        <div class="control">
                            <input id="category_slug" name="category_slug" class="input" type="text" placeholder="{{$category->slug}}" value="{{$category->slug}}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="category_description" class="label">Tag Description</label>
                        <div class="control">
                            <textarea id="category_description" name="category_description" class="textarea"
                                      placeholder="{{$category->description}}">{{$category->description}}</textarea>
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
                                <editdeletemodal route="{{route('categories.destroy', $category->id)}}"
                                             tagname="{{$category->name}}"></editdeletemodal>
                            </div>
                            <div class="primary-action-button">
                                <button type="submit" name="category_updated" value="category_updated"
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