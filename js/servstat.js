$(document).ready(function() {
    $("#btn-killhon").click(function() {
        
        function KillHon() {
            $.ajax({
                type : "POST",
                url  : "functions/fetchdata.php",
                data : {action:"ShowKillHon"},
                success: function(data){
                    $("#content").html(data);
                }
            });
        }
        KillHon();
    });
});

$(document).ready(function() {
    $("#btn-1v1").click(function() {
        
        function oneVone() {
            $.ajax({
                type : "POST",
                url  : "functions/fetchdata.php",
                data : {action:"show1v1"},
                success: function(data){
                    $("#content").html(data);
                }
            });
        }
        oneVone();
    });
});