$(document).ready(function(){
    $("#filterNotices").change(function(){
        var val = $(this).val();
        if(val == "all"){
            $('.notice').show();
        } else if(val == "mine"){
            $('.notice').hide();
            $(".myNotice").show();
        } else if(val == "tenant"){
            $('.notice').hide();
            $(".noticeTenant").show();
        }
        else if(val == "landlord")
        {
            $('.notice').hide();
            $(".noticeLandlord").show();
        }
    })
    
    
})