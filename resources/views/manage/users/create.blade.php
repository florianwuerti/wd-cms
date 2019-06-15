@section('page_title', 'Create Users')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create new Users</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('users.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="first_name" class="label">Firstname:</label>
                        <div class="control">
                            <input type="text" class="input" name="first_name" id="first_name" placeholder="Firstname">
                        </div>
                    </div><!-- end of first_name field -->

                    <div class="field">
                        <label for="last_name" class="label">Lastname:</label>
                        <div class="control">
                            <input type="text" class="input" name="last_name" id="last_name" placeholder="Lastname">
                        </div>
                    </div><!-- end of last_name field -->

                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <div class="control">
                            <input type="email" class="input" name="email" id="email" placeholder="name@app.com">
                        </div>
                    </div><!-- end of email field -->

                    <div class="field">
                        <label for="password" class="label">Password:</label>
                        <div class="control">
                            <input type="password" class="input" name="password" id="password" v-if="!auto_password"
                                   placeholder="Manually give a password to this user">
                            <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate
                                Password
                            </b-checkbox>
                        </div>
                    </div><!-- end of password field -->
                    <button class="button is-success"><i class="fas fa-user-plus m-r-10"></i> Create User</button>
                </form>
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection