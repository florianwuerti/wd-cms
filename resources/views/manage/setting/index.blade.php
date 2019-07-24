@section('page_title', 'General Settings')

@extends('layouts.backend')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">General Settings</h1>
            </div>
        </div>
        <hr class="m-t-0">

        @if (session('status'))
            <div class="notification notification-success is-info">
                <button class="delete"></button>
                {{ session('status') }}
            </div>
        @endif


        @if ($errors->any())
            <div class="notification is-danger">
                <button class="delete"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$loop->iteration}}: {{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form">
            {{csrf_field()}}
            <div class="columns">
                <div class="column p-t-0 p-l-0 p-r-0 p-b-0 is-three-quarters-desktop is-three-quarters-tablet">

                    <div class="column">
                        <div class="card" aria-id="contentIdForA11y3">
                            <div slot="trigger" slot-scope="props" class="card-header" role="button"
                                 aria-controls="contentIdForA11y3">
                                <div class="media-content">
                                    <p class="card-header-title title is-4 m-b-0"></p>
                                    <p class="card-header-title subtitle is-6"></p>
                                </div>
                                <a class="card-header-icon">
                                    <b-icon class="" :icon="props.open ? 'menu-down' : 'menu-up'"></b-icon>
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <div class="field">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-one-quarter-desktop is-narrow-tablet">
                    <div class="card card-widget m-b-20" aria-id="contentIdForA11y3">
                        <div class="card-header">
                            <p class="card-header-title">Publish</p>
                        </div>
                        <div class="card-content">
                            <div class="buttons is-right">
                                <button class="button is-primary m-b-0">Save Settings</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
@endsection