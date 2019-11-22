$(document).ready(function (e){
    $("#uploadForm").on('submit',(function(e){
        e.preventDefault();
        $('#loader-icon').show();
        var valid;
        valid = validateContact();
        if(valid) {
            $.ajax({
                url: "sendEmail.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    $("#mail-status").html(data);
                    $('#loader-icon').hide();
                },
                error: function(){}

            })
        }
    }))}