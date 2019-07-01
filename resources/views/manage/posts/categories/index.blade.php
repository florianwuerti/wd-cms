@section('page_title', 'Manage Categories')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Categories</h1>
            </div>
        </div>
        <hr class="m-t-0">

        @if (session('status'))
            <div class="notification notification-success is-info">
                {{ session('status') }}
            </div>
        @endif

        <div class="columns">
            <div class="column is-one-third">
                <h2 class="subtitle">Add New Categorie</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif

                <form action="{{route('categories.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="field">
                        <label for="category_name" class="label">Name</label>
                        <div class="control">
                            <input id="category_name" name="category_name" class="input" type="text" placeholder="Category name">
                        </div>
                    </div>
                    <div class="field">
                        <label for="category_slug" class="label">Slug</label>
                        <div class="control">
                            <input id="category_slug" name="category_slug" class="input" type="text" placeholder="Category slug"
                                   value="{{ old('category_slug') }}">
                            @if($errors->first('category_slug'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('category_slug') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="category_description" class="label">Category Description</label>
                        <div class="control">
                            <textarea id="category_description" name="category_description" class="textarea"
                                      placeholder="Category Description"></textarea>
                        </div>
                    </div>
                    <div class="primary-action-button">
                        <button type="submit" name="add_new_category" value="add_new_category" class="button is-primary">Add New
                            Category
                        </button>
                    </div>
                </form>
            </div>
            <div class="column is-two-thirds">
                <div class="b-table"><!---->
                    <div class="table-wrapper">
                        <table class="table has-mobile-cards">
                            <thead>
                            <tr><!----> <!---->
                                <th class="">
                                    <div class="th-wrap">Name <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                                    </div>
                                </th>
                                <th class="">
                                    <div class="th-wrap">Description <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                                    </div>
                                </th>
                                <th class="">
                                    <div class="th-wrap">Slug<span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                                    </div>
                                </th>
                                <th class="">
                                    <div class="th-wrap">Count <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                    </span>
                                    </div>
                                </th>
                                <th class="">
                                    <div class="th-wrap">Option
                                        <i class="mdi mdi-arrow-up"></i>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $cat)

                                <tr draggable="false" class=""><!----> <!---->
                                    <td>
                                        <a href="{{route('categories.edit', $cat->id)}}">
                                            <span>{{$cat->name}}</span>
                                        </a>
                                    </td>
                                    <td>
                                        @if($cat->description)
                                            <span>{{$cat->description}}</span>
                                        @else
                                            <span class="has-text-grey-lighter">No description</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span>{{$cat->slug}}</span>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <span>{{$cat->posts->count()}}</span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('categories.edit', $cat->id)}}" class="">
                                            <i class="fas fa-edit"></i>
                                            <span class="is-hidden">Edit</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{$categories->links('vendor.pagination.default')}}

            </div>
        </div>
    </div>
@endsection