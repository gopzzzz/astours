<!DOCTYPE html>
<html lang="en">

@include('layouts.webpartials.head')

<body>

    
        @include('layouts.webpartials.header')
    

    @yield('content')

    @include('layouts.webpartials.footer')
    @include('layouts.webpartials.footerscript')

</body>
</html>
