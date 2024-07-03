@component('mail::message')

<h1 style="text-align: center;">CONTACT MESSAGE</h1>
    
**Name:** {{ $fullname }}  

**Email:** {{ $email }}

**Message:** {{ $message }}
<hr>
@component('mail::button', ['url' => 'http://localhost:8000'])
    Visit OURDEN
@endcomponent
@endcomponent
