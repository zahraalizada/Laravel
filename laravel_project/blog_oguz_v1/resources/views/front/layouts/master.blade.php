{{-- views-larda front->layouts klasoru icerisinde olusturulmus, ismi header olan blade include ediliyor. --}}
@include('front.layouts.header')
{{-- yield ile o alani kendimize ayiriyoruz  --}}
@yield('content')
{{-- views-larda front->layouts klasoru icerisinde olusturulmus, ismi footer olan blade include ediliyor. --}}
@include('front.layouts.footer')
