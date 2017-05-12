$(document).ready(function () {
    $("#fileToUpload").change(function () {
        $("#uploadForum").submit();
    });
    $("#loginDiv .container button").click(function (e) {
        var a = $("#passwordNumber").val();
        var b=$(e.target).text();
        if (b != "Submit") {
            $("#passwordNumber").val(a + b);
        }else{
            $.get( "/password", function( data ) {
               if(data==a){
                   $("#loginDiv").remove();
               }
            });
        }
    });
});