@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <h1 class="text-center">STAFF LOGS</h1>
    <p class="text-center text-muted">All staff actions</p>
    <div class="navbar-nav ml-auto mx-auto">
        <a class="text-center link-success text-decoration-none" id="save" href="">
            Download Table
        </a>
    </div>
    <section class="table">
        <table class="table table-dark table-hover table-responsive table-sm" id="table">
            <thead>
            <tr>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 0)">Date</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 1)">Author</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 2)">Operation</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 3)">Abstract</th>
            </tr>
            </thead>
            <tbody id="tbody01">
                    @foreach($staffLogs as $staffLog)
                        @if($staffLog['author'] !== 'Shopify')
                            <tr>
                                <td class="text-center">{{ $staffLog['created_at'] }}</td>
                                <td class="text-center">{{ ucfirst($staffLog['author']) }}</td>
                                <td class="text-center">{{ ucfirst($staffLog['verb']) }}</td>
                                <td class="text-center">{{ $staffLog['description'] }}</td>
                            </tr>
                        @endif
                    @endforeach
            </tbody>
        </table>
    </section>
    @extends('layouts.scripts')
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        userDetails = '';
        $('table tbody tr').each(function () {
            var detail = '';
            $(this).find('td').each(function () {
                detail += $(this).html() + ' | ';
            });
            detail = detail.substring(0, detail.length - 1);
            detail += '';
            userDetails += detail + "\r\n";
        });
        var a = document.getElementById('save');
        a.onclick = function () {
            var a = document.getElementById("save");
            var file = new Blob([userDetails], {type: 'text/plain'});
            a.href = URL.createObjectURL(file);
            let utc = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
            a.download = 'stafflogs-' + utc + '.txt';
        }
    </script>
@endsection

