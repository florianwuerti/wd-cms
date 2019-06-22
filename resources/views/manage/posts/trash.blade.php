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

        @include('_includes.nav.table-nav-list')

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
                    @foreach($postsTrash as $postTrash)

                        <tr draggable="false" class=""><!----> <!---->
                            <td class="">
                                <a href="{{route('posts.edit', $postTrash->id)}}">
                                    <span>{{$postTrash->post_title}}</span>

                                    @if($postTrash->post_status == 1)
                                        <span class="tag is-dark">Draft</span>
                                    @endif

                                </a>
                            </td>
                            <td>
                                <span>{{$postTrash->author->display_name}}</span>
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
                                    @if($postTrash->post_status === 1 ? 'entwurf' : '')
                                        <span>Published <br> 2019/04/10 <br> 8:42:56 pm</span>
                                    @else
                                        <span>Last Modified <br> 2019/04/04 <br> 8:20:41 am</span>
                                    @endif
                                </span>
                            </td>
                            <td>
                                <a href="{{route('posts.edit', $postTrash->id)}}" class=""><i class="fas fa-edit"></i><span class="is-hidden">Edit</span></a>
                                <a href="{{route('posts.show', $postTrash->id)}}" class=""><i class="far fa-eye"></i><span class="is-hidden">View</span></a>
                                <a href="{{route('posts.totrash', $postTrash->id)}}"><i class="fas fa-backspace"></i><span class="is-hidden">Delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{$postsTrash->links('vendor.pagination.default')}}
    </div>
@endsection