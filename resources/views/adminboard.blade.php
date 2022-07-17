@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')

@yield('head')

<body>
    @yield('footer')
</body>

@section('content')
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
@endsection

@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <script>
        actions.TitleBar.create(app, {title: 'Admin Dashboard'});
    </script>
@endsection
