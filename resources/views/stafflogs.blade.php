@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <div class="main-block">
        <div class="info-block">
            <h1 class="main-text">STAFF LOGS</h1>
            <p class="text-muted text-center">All staff actions</p>
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
                                            onclick="exportTableToTXT('stafflogs.txt')">Export
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
                                    <th onclick="sorting(tbody01, 1)">Date</th>
                                    <th onclick="sorting(tbody01, 2)">Author</th>
                                    <th onclick="sorting(tbody01, 3)">Operation</th>
                                    <th onclick="sorting(tbody01, 4)">Abstract</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="tbody01">
                                @foreach($staffLogs as $staffLog)
                                    @if($staffLog['author'] !== 'Shopify')
                                    <tr>
                                        <td class="">
                                            <input type="checkbox" id="checked-box" name="checked-box">
                                        </td>
                                        <td class="created-date">{{ $staffLog['created_at'] }}</td>
                                        <td class="author">{{ ucfirst($staffLog['author']) }}</td>
                                        <td class="event-text {{$staffLog['verb']}}">{{ ucfirst($staffLog['verb']) }}</td>
                                        <td class="description-text">
                                            {{ $staffLog['description'] }}
                                        </td>
                                        <td>
                                            @if(!empty($staffLog['path']))
                                                <a href="https://custom-admine-application.myshopify.com{{ $staffLog['path'] }}"
                                                   target="_blank">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
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
