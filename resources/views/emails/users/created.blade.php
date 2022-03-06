@component('mail::message')
{{-- # Introduction --}}

Welcome {{ $name}},
<br>
Your Account has been created Successfully..!
<br>
To login please clivk on below button
@component('mail::button', ['url' => $url ?? route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
