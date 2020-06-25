@extends('layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-2 text-center">Contact Us</h1>

            <div class="row">
                <div class="col-12 font-italic">
                    <div class="p-3 my-3 bg-dark text-white">
                        <p class="p-0 m-0"><a class="text-white" href="/">Home</a> / Contact us</p>
                    </div>
                </div>
            </div>

             @if(session()->has('message'))
                <div class="row justify-content-center">
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ session()->get('message') }}
                    </div>
                </div>
            @endif

            @if( ! session()->has('message'))
            <form action="/contact" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Enter your name" required>
                    <div>{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" aria-describedby="email" placeholder="Enter your email" required>
                    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    <div>{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                    <label for="select">What's going on?</label>
                    <select name="select" class="form-control">
                        <option> </option>
                        <option>I have a problem with my website, please solve it!</option>
                        <option>I'm planning a project and I wanna invite you to participate in it!</option>
                        <option>I want to have modern design website, presentation!</option>
                        <option>Bogdan, make me a cool video!</option>
                        <option>I would like to hire you as a specialist in an office!</option>
                    </select>
                    <div>{{ $errors->first('select') }}</div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Enter your message">{{ old('message') }}</textarea>
                    <small id="email" class="form-text text-muted">Ask a question, request a project audit, tell anything you want - it's 100% anonymous!</small>
                    <div>{{ $errors->first('message') }}</div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" required="">
                    <label class="form-check-label" for="checkbox">I'm not a robot and I'm 18+</label>
                </div>

                @csrf

                <div class="pt-3">
                    <button type="submit" class="btn btn-primary">Send message</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
