@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <div class="main-block">
        <div class="info-block">
            <h1 class="main-text">ADMIN LOGS</h1>
            <p class="text-muted text-center">All actions about orders, refunds, products and clients</p>
        </div>
        <div class="table-block">
            <div class="container">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-xs-7">
                                    <input class="search-input" id='inputText' onkeyup='searchTable()'
                                           type='text' placeholder="Search...">
                                    <button class="btn btn-primary"
                                            onclick="exportTableToTXT('adminlogs.txt')">Export
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table table-striped table-hover" id="tableLog">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="select-all" name="select-all">
                                    </th>
                                    <th onclick="sorting(tbody01, 1)">Event Type</th>
                                    <th onclick="sorting(tbody01, 2)">Time</th>
                                    <th onclick="sorting(tbody01, 3)">Abstract</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="tbody01">
                                @foreach($adminLogs as $adminLog)
                                    <tr>
                                        <td class="">
                                            <input type="checkbox" id="checked-box" name="checked-box">
                                        </td>
                                        <td class="event-text {{$adminLog['verb']}}">{{ ucfirst($adminLog['verb']) }}</td>
                                        <td class="created-date">{{ $adminLog['created_at'] }}</td>
                                        <td class="description-text">
                                            {{ $adminLog['description'] }}
                                        </td>
                                        <td>
                                            @if(!empty($adminLog['path']))
                                                <a href="https://custom-admine-application.myshopify.com{{ $adminLog['path'] }}"
                                                   target="_blank">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @extends('layouts.modalwindow')
    </div>

    @extends('layouts.scripts')
@endsection

@section('scripts')
    @parent
@endsection
