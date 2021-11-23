@component('mail::message')
# Hey, {{$name}}

Thank you for registration.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
