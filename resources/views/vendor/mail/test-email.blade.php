@component('mail::message')

<h1 style="text-align: center;">GREETINGS!</h1>
    
WELCOME, {{ $name }} to OUR DEN!

Thank you for registering with OURDEN. We are excited to have you on board!

<hr>
@component('mail::button', ['url' => 'http://localhost:8000'])
    Visit OURDEN
@endcomponent
@endcomponent