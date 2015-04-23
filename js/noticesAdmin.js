$(document).ready(function(){
    
    $("#propList").change(function(){
        var val = $(this).val();
        if(val == "0"){
            $('tr[class^="prop"]').show();
        } else if($("." + val).css('display') != 'none'){
            $('tr[class^="prop"]').hide();
            $("." + val).show();
        }
        else if($("." + val).css('display') == 'none')
        {
            $('tr[class^="prop"]').hide();
            $("." + val).show();
        }
    })
    
    
})