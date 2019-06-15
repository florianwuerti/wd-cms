@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User {{$user->display_name}}</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label for="first_name" class="label">Firstname:</label>
                        <p class="control">
                            <input type="text" class="input" name="first_name" id="first_name"
                                   value="{{$user->first_name}}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="last_name" class="label">Lastname:</label>
                        <p class="control">
                            <input type="text" class="input" name="last_name" id="last_name"
                                   value="{{$user->last_name}}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="display_name" class="label">Display Name:</label>
                        <div class="control">
                            <input type="text" class="input" name="display_name" id="display_name" placeholder="Display Name"  value="{{$user->display_name}}" disabled>
                        </div>
                    </div><!-- end of display_name field -->

                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <p class="control">
                            <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
                        </p>
                    </div>

                    <changeuserpassword></changeuserpassword>

                    <p class="label m-t-20">Profile Picture</p>
                    <imgupload></imgupload>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                </div> <!-- end of .column -->
            </div>
            <div class="columns">
                <div class="column">
                    <hr/>
                    <button class="button is-link is-pulled-right" style="width: 250px;"><i class="fas fa-pencil-alt m-r-10"></i> Update User</button>
                </div>
            </div>
        </form>

    </div> <!-- end of .flex-container -->
@endsection