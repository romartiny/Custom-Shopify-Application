@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')

@section('content')
    <h1 class="text-center logged-text">You are logged in {{ $shopDomain ?? Auth::user()->name }} log panel</h1>
    <p class="text-center">Select the option from navigation bar</p>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Admin Panel' });
    </script>
@endsection
