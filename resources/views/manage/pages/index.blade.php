@section('page_title', 'Manage Users')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Pages</h1>
            </div>
            <div class="column">
                <a href="{{route('pages.create')}}" class="button is-primary is-pulled-right">
                    <i class="fas fa-newspaper m-r-10"></i> Create New Page
                </a>
            </div>
        </div>
        <hr class="m-t-0">

        <nav class="is-flex">
            <ul class="is-flex m-b-25">
                @if($pages->count() >= 1)
                    <li class="all">
                        <a href="{{route('pages.index')}}" class="current" aria-current="page">All ({{$pages->count()}})</a>
                        |
                    </li>
                @else
                    <li class="all">
                        <a href="{{route('pages.index')}}" class="current" aria-current="page">All (0)</a> |
                    </li>
                @endif

                @if($pagesPublished->count())
                    <li class="publish">
                        <a href="{{route('manage.pages.published')}}">Published <span class="count">({{$pagesPublished->count()}})</span></a> |
                    </li>
                @endif

                @if($pagesDrafts->count())
                    <li class="publish">
                        <a href="{{route('manage.posts.drafst')}}">Drafts <span class="count">({{$pagesDrafts->count()}})</span></a> |
                    </li>
                @endif

                @if($pagesTrash->count())
                    <li class="publish">
                        <a href="{{route('manage.pages.trash')}}">Trash <span class="count">({{$pagesTrash->count()}})</span></a> |
                    </li>
                @endif

            </ul>
        </nav>

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
                            <div class="th-wrap">Slug <span class="icon is-small" style="display: none;">
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
                            <div class="th-wrap">Template <span class="icon is-small" style="display: none;">
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

                    @if(count($pages) >= 1)

                        @foreach($pages as $page)

                            <tr draggable="false" class=""><!----> <!---->
                                <td class="">
                                    <a href="{{route('pages.edit', $page->id)}}">
                                        <span>{{$page->page_title}}</span>
                                    </a>
                                </td>
                                <td class="">
                                    <a href="{{route('pages.edit', $page->id)}}">
                                        <span>{{$page->page_slug}}</span>
                                    </a>
                                </td>
                                <td>
                                    <span>{{$page->author->display_name}}</span>
                                </td>
                                <td>
                                    <span>Template Name</span>
                                </td>
                                <td class="is-centered">
                                    <a href="{{route('pages.edit', $page->id)}}" class="">
                                        <i class="fas fa-edit"></i><span class="is-hidden">Edit</span>
                                    </a>
                                    <a href="{{route('frontend.page', $page->page_slug)}}" class="">
                                        <i class="far fa-eye"></i><span class="is-hidden">View</span>
                                    </a>
                                    <a href="{{route('manage.pages.totrash', $page->id)}}"><i
                                                class="far fa-trash-alt"></i>
                                        <span class="is-hidden">Delete</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr draggable="false" class=""><!----> <!---->
                            <td class="">
                                <p>No pages found.</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection