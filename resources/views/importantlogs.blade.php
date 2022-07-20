@extends('shopify-app::layouts.default')
@extends('layouts.header')
@extends('layouts.head')
@section('content')
    <h1 class="text-center">IMPORTANT LOGS</h1>
    <p class="text-center text-muted">All data about created collections, products, blogs and etc</p>
    <div class="navbar-nav ml-auto mx-auto">
        <a class="text-center link-success text-decoration-none" id="save" href="">
            Download Table
        </a>
    </div>
    <section class="table">
        <table class="table table-dark table-hover table-responsive table-sm">
            <thead>
            <tr>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 0)">Event</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 1)">Date</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 2)">Author</th>
                <th scope="col" class="text-center" onclick="sorting(tbody01, 3)">Abstract</th>
            </tr>
            </thead>
            <tbody id="tbody01">
            @foreach($importantLogs as $importantLog)
                <tr>
                    <td class="text-center">{{ ucfirst($importantLog['subject_type'])  }}</td>
                    <td class="text-center">{{ $importantLog['created_at']  }}</td>
                    <td class="text-center">{{ $importantLog['author'] }}</td>
                    <td class="text-center">{{ ucfirst($importantLog['description']) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
@extends('layouts.scripts')

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
