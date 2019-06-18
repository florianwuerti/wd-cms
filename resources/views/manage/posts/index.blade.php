@section('page_title', 'Manage Users')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Posts</h1>
            </div>
            <div class="column">
                <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right"><i
                            class="fa fa-user-plus m-r-10"></i> Create New Post</a>
            </div>
        </div>
        <hr class="m-t-0">

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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr draggable="false" class=""><!----> <!---->
                            <td class="">
                                <a href="{{route('posts.edit', $post->id)}}">
                                    <span>{{$post->post_title}}</span>
                                    @if($post->post_status == 0 ? 'entwurf' : '')
                                        <span class="tag is-dark">Draft</span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <span>{{$post->author->display_name}}</span>
                            </td>
                            <td>
                            <span>
                                <span class="tag">Tutorial</span>
                                <span class="tag">Tips</span>
                                <span class="tag">News</span>
                            </span>
                            </td>
                            <td>
                                <span>
                                    <span class="tag"></span>
                                </span>
                            </td>
                            <td class="has-text-centered">
                                <span>0</span>
                            </td>
                            <td data-label="Date">
                                <span>
                                    @if($post->post_status === 1 ? 'entwurf' : '')
                                        <span>Published <br> 2019/04/10 <br> 8:42:56 pm</span>
                                    @else
                                        <span>Last Modified <br> 2019/04/04 <br> 8:20:41 am</span>
                                    @endif
                                </span>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{$posts->links('vendor.pagination.default')}}
    </div>
@endsection