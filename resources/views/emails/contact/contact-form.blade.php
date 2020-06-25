@component('mail::message')
<h1># Project1: incoming email</h1>

<strong>Name:</strong> {{ $data['name'] }}<br>
<strong>Email:</strong> {{ $data['email'] }}<br>
<strong>Message:</strong> {{ $data['select'] }}<br>
{{ $data['message'] }}
