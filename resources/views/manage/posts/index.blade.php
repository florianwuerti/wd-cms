@section('page_title', 'Manage Users')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Posts</h1>
            </div>
            <div class="column">
                <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right">
                    <i class="fas fa-newspaper m-r-10"></i> Create New Post
                </a>
            </div>
        </div>
        <hr class="m-t-0">

        @include('_includes.nav.backend.table-nav-list')

        <div class="b-table"><!---->
            <div class="table-wrapper">
                <table class="table has-mobile-cards">
                    <thead>
                    <tr><!----> <!---->
                        <th class="">
                            <div class="th-wrap">Title <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                            </div>
                        </th>
                        <th class="">
                            <div class="th-wrap">Author <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                            </div>
                        </th>
                        <th class="">
                            <div class="th-wrap">Categories <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                            </div>
                        </th>
                        <th class="">
                            <div class="th-wrap">Tags <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                            </div>
                        </th>
                        <th>
                            <div class="th-wrap has-text-centered">
                                <span class="icon">
                                    <i class="fas fa-comment-alt"></i>
                                </span>
                                <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                            </div>
                        </th>
                        <th class="">
                            <div class="th-wrap is-centered">Date <span class="icon is-small" style="display: none;">
                                    <i class="mdi mdi-arrow-up"></i>
                                </span>
                            </div>
                        </th>
                        <th class="">
                            <div class="th-wrap is-centered">Option
                                <i class="mdi mdi-arrow-up"></i>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($posts) >= 1)
                        @foreach($posts as $post)

                            <tr draggable="false" class=""><!----> <!---->
                                <td class="">
                                    <a href="{{route('posts.edit', $post->id)}}">
                                        <span>{{$post->post_title}}</span>

                                        @if($post->post_status == 1)
                                            <span class="tag is-dark">Draft</span>
                                        @endif

                                    </a>
                                </td>
                                <td>
                                    <span>{{$post->author->display_name}}</span>
                                </td>
                                <td>
                                    <span>
                                        @foreach($post->categories as $cats)
                                            <span class="tag">{{$cats->name}}</span>
                                        @endforeach
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        @foreach($post->tags as $tags)
                                            <span class="tag">{{$tags->name}}</span>
                                        @endforeach
                                    </span>
                                </td>
                                <td class="has-text-centered">
                                    <span>0</span>
                                </td>
                                <td data-label="Date">
                                <span>
                                        @if(!$post->updated_at)
                                        <span>Published <br> {{Carbon\Carbon::parse($post->published_at)->format('Y/m/d')}} <br> {{Carbon\Carbon::parse($post->published_at)->format('g:i:s a')}}</span>
                                    @else
                                        <span>Last Modified <br> {{Carbon\Carbon::parse($post->updated_at)->format('Y/m/d')}} <br> {{Carbon\Carbon::parse($post->updated_at)->format('g:i:s a')}}</span>
                                    @endif
                                </span>
                                </td>
                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}" class="">
                                        <i class="fas fa-edit"></i><span class="is-hidden">Edit</span>
                                    </a>
                                    <a href="{{route('frontend.posts.single', $post->post_slug)}}" class="">
                                        <i class="far fa-eye"></i><span class="is-hidden">View</span>
                                    </a>
                                    <a href="{{route('manage.posts.totrash', $post->id)}}"><i class="far fa-trash-alt"></i>
                                        <span class="is-hidden">Delete</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr draggable="false" class=""><!----> <!---->
                            <td class="">
                                <p>No posts found.</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{$posts->links('vendor.pagination.default')}}
    </div>
@endsection