@component('mail::message')
# New computer: {{ $computer->title }}

{{ $computer->description }}
@component('mail::button', ['url' => url('/computer/'. $computer->slug)])
Computer Info
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
