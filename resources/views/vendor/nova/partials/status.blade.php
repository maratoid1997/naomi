@if ($status)
{{--    <style>--}}
{{--        [dusk="{{$id}}-row"] { background: #FDD !important; }--}}
{{--    </style>--}}
    <strong style="color: {{$color}};">{{ $status }}</strong>
@else
    {{ $status }}
@endif
