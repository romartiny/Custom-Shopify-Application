@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <div class="main-block">
        <div class="info-block">
            <h1 class="main-text">IMPORTANT LOGS</h1>
            <p class="text-muted text-center">All data about created collections, products, blogs and etc</p>
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
                                            onclick="exportTableToTXT('importantlogs.txt')">Export
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
                                    <th onclick="sorting(tbody01, 1)">Event</th>
                                    <th onclick="sorting(tbody01, 2)">Date</th>
                                    <th onclick="sorting(tbody01, 3)">Author</th>
                                    <th onclick="sorting(tbody01, 4)">Abstract</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="tbody01">
                                @foreach($importantLogs as $importantLog)
                                    <tr>
                                        <td class="">
                                            <input type="checkbox" id="checked-box" name="checked-box">
                                        </td>
                                        <td class="event-text">{{ ucfirst($importantLog['subject_type'])  }}</td>
                                        <td class="created-date">{{ $importantLog['created_at']  }}</td>
                                        <td class="author">{{ $importantLog['author'] }}</td>
                                        <td class="description-text">
                                            {{ ucfirst($importantLog['description']) }}
                                        </td>
                                        <td>
                                            @if(!empty($importantLog['path']))
                                                <a href="https://custom-admine-application.myshopify.com{{ $importantLog['path'] }}"
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
