@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <h1 class="text-center">ADMIN LOGS</h1>
    <p class="text-center text-muted">All actions about orders, refunds, products and clients</p>
    <div class="navbar-nav ml-auto mx-auto">
        <a class="text-center link-success text-decoration-none" id="save" href="">
            Download Table
        </a>
    </div>
    <section class="table">
        <table class="table table-dark table-hover table-responsive table-sm" id="table">
            <thead>
            <tr>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 0)">Event type</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 1)">Time</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 2)">Abstract</th>
            </tr>
            </thead>
            <tbody id="tbody01">
            @foreach($adminLogs as $adminLog)
                <tr>
                    <td class="text-center">{{ ucfirst($adminLog['verb']) }}</td>
                    <td class="text-center">{{ $adminLog['created_at'] }}</td>
                    <td class="text-center">{{ $adminLog['description'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    @extends('layouts.scripts')
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        userDetails='';
        $('table tbody tr').each(function(){
            var detail='(';
            $(this).find('td').each(function(){
                detail+=$(this).html()+',';
            });
            detail=detail.substring(0,detail.length-1);
            detail+=')';
            userDetails+=detail+"\r\n";
        });
        var a=document.getElementById('save');
        a.onclick=function(){
            var a = document.getElementById("save");
            var file = new Blob([userDetails], {type: 'text/plain'});
            a.href = URL.createObjectURL(file);
            a.download = "data.txt";
        }
    </script>
@endsection
