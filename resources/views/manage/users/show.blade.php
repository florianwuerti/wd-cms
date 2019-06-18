@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Show User: {{ $user->display_name }}</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="first_name" class="label">Firstname:</label>
                    <p class="control">
                        {{$user->first_name}}
                    </p>
                </div>

                <div class="field">
                    <label for="last_name" class="label">Lastname:</label>
                    <p class="control">
                        {{$user->last_name}}
                    </p>
                </div>

                <div class="field">
                    <label for="email" class="label">Email:</label>
                    <p class="control">
                        {{$user->email}}
                    </p>
                </div>

                <div class="img-input-data-wrapper">
                    <p class="label m-t-20">Profile Picture</p>
                    <img src="{{asset('/uploads/images/'. $user->image)}}" class="img-input-data" alt=""/>
                </div>
            </div> <!-- end of .column -->
        </div>
        <div class="columns">
            <div class="column">
                <hr/>
                <a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right"
                   style="width: 250px;"><i class="fas fa-user-edit m-r-10"></i> Edit User</a>
            </div>
        </div>

    </div> <!-- end of .flex-container -->
@endsection