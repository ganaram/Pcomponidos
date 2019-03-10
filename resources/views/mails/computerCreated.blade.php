@component('mail::message')
# New Computer made : {{ $computer->model }}

{{ $computer->description }}
@component('mail::button', ['url' => url('/computers/'. $computer->slug)])
Computer Info
@endcomponent

Price:
{{$computer->price}} €

Thanks,<br>
{{ config('app.name') }}
@endcomponent