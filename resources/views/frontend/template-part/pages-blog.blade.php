@section('page_title', $page->page_title)
@extends('layouts.frontend')

@section('content')

    <h1>{{$page->page_title}}</h1>

    {!! $page->page_content !!}

    <div class="columns">

        <section class="posts__list">
            <div class="columns posts__list--col">
                @foreach($posts as $post)
                    <article id="{{$post->id}}" class="column is-one-quarter">
                        <a href="{{ route('frontend.posts.single', $post->post_slug) }}" title="{{$post->post_title}}"
                           class="posts__list--item-link">
                            <div class="posts__list--item-container">
                                <header class="posts__list--item-header">
                                    <div class="posts__list--item-header-content-images">
                                        <!-- post thumbnail -->
                                        <figure>
                                            <img src="http://localhost/wptheme.aood/wp-content/uploads/2018/03/Testimages-install-wp.jpg"
                                                 alt="Images Titel">
                                        </figure>
                                        <!-- post thumbnail -->
                                    </div>
                                    <div class="posts__category--list">
                                        @foreach($post->categories as $cats)
                                            <span class="posts__category--list-item">{{$cats->name}}</span>
                                        @endforeach
                                    </div>
                                </header>
                                <div class="posts__list--item-content">
                                    <div class="posts__list--item-body">
                                        <h2 class="posts__list--item-headline">{{$post->post_title}}</h2>
                                        {!! Str::words($post->post_content, 40, '...') !!}
                                    </div>
                                    <div class="posts__list--item-footer">
                                        <div class="posts__item--author">
                                            <div class="posts__item--author-avatar">
                                                <img src="http://localhost/wptheme.aood/wp-content/uploads/2017/09/florian-profil-team-150x150.jpg"
                                                     alt="Images Titel">
                                            </div>
                                        </div>

                                        <div class="posts__list--item-entry">
                                            <div class="posts__item--entry-author">{{ $post->author->display_name }}</div>
                                            <time class="posts__item--entry-release"
                                                  datetime="">{{$post->published_at}}</time>
                                            <time class="posts__item--entry-updated"
                                                  datetime="">
                                                Aktualisiert: {{ $post->updated_at }}</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>

    </div>
@endsection
