@section('page_title', $page->page_title)
@extends('layouts.frontend')

@section('content')

    <h1>{{$page->page_title}}</h1>

    <p>If you would like to contact us, please use the following form, send us an e-mail or give us a call.</p>

    <form action="{{route('frontend.contact.sendMassage')}}" method="post">
        {{csrf_field()}}

        <div class="field">
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded">
                        <label for="firstname" class="label">Firstname</label>
                        <input class="input" name="firstname" type="text" placeholder="Your firstname">
                    </p>
                </div>
                <div class="field">
                    <p class="control is-expanded">
                        <label for="lastname" class="label">Lastname</label>
                        <input class="input" name="lastname" type="text" placeholder="Your lastname">
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded">
                        <label for="phone" class="label">Phone</label>
                        <input class="input" name="phone" type="text" placeholder="Your phone number">
                    </p>
                </div>
                <div class="field">
                    <p class="control is-expanded">
                        <label for="email" class="label">E-Mail Address</label>
                        <input class="input" name="email" type="email" placeholder="Your email address">
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <label for="subject" class="label">Subject</label>
                        <input class="input" type="text" name="subject" placeholder="Your request headline">
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <label for="message" class="label">Question</label>
                        <textarea class="textarea" name="message" placeholder="Write your request here"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <button class="button is-primary">
                            Send message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection