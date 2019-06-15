@section('page_title', 'Manage Users')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
                <a href="{{route('users.create')}}" class="button is-primary is-pulled-right"><i
                            class="fa fa-user-plus m-r-10"></i> Create New User</a>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="columns is-multiline">

            @foreach($users as $user)
                <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="{{asset('/uploads/images/'. $user->image)}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">{{$user->display_name}}</p>
                                    <p class="subtitle is-6">Administrator</p>
                                </div>
                            </div>

                            <div class="content"></div>
                            <div class="columns is-mobile">
                                <div class="column is-one-half">
                                    <a href="{{route('users.show', $user->id)}}"
                                       class="button is-primary is-fullwidth">Details</a>
                                </div>
                                <div class="column is-one-half">
                                    <a href="{{route('users.edit', $user->id)}}"
                                       class="button is-light is-fullwidth">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of cards. -->
                </div>
            @endforeach

        </div>

        {{$users->links('vendor.pagination.default')}}
    </div>
@endsection