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
