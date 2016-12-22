<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body data-spy="scroll" data-offset="0" data-target="#navigation" bsurl="{{ url('') }}" adminRoute="{{ config('laraadmin.adminRoute') }}">

@yield('main-content')
    
@include('layouts.partials.footer')

@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>