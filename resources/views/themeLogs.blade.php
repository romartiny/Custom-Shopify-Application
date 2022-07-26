@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <div class="main-block">
        <div class="info-block">
            <h1 class="main-text">ASSETS AND THEME LOGS</h1>
            <p class="text-muted text-center">All data about edited, created or deleted themes</p>
        </div>
        <div class="table-block">
            <div class="container">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-xs-7">
                                    <input class="search-input" id="inputText" onkeyup="searchTable()"
                                           type="text" placeholder="Search...">
                                    <button class="btn btn-primary"
                                            onclick="exportTableToTXT('themeLogs')">Export
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table table-striped table-hover" id="tableLog">
                                <thead>
                                <tr>
                                    <th class="main-item">
                                        <input type="checkbox" id="select-all" name="select-all">
                                    </th>
                                    <th class="main-item" onclick="sorting(logs, 1)">File</th>
                                    <th class="main-item" onclick="sorting(logs, 2)">Updated</th>
                                    <th class="main-item" onclick="sorting(logs, 3)">Abstract</th>
                                </tr>
                                </thead>
                                <tbody id="logs">
                                @foreach($themeLogs as $themeLog)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="checked-box" name="checked-box">
                                        </td>
                                        <td class="event-text">{{ $themeLog['name'] }}</td>
                                        <td class="created-date">{{ $themeLog['updated_at'] }}</td>
                                        <td class="description-text">
                                            {{ ucfirst($themeLog['role']) }}
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
        @extends('layouts.modalWindow')
    </div>

    @extends('layouts.scripts')
@endsection

@section('scripts')
    @parent
@endsection
