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
    $("#btn-2v2").click(function() {
        
        function twoVtwo() {
            $.ajax({
                type : "POST",
                url  : "functions/fetchdata.php",
                data : {action:"show2v2"},
                success: function(data){
                    $("#content").html(data);
                }
            });
        }
        twoVtwo();
    });
    $("#btn-3v3").click(function() {
        
        function threeVthree() {
            $.ajax({
                type : "POST",
                url  : "functions/fetchdata.php",
                data : {action:"show3v3"},
                success: function(data){
                    $("#content").html(data);
                }
            });
        }
        threeVthree();
    });
    $("#btn-3v3q").click(function() {
        
        function threeVthreeQ() {
            $.ajax({
                type : "POST",
                url  : "functions/fetchdata.php",
                data : {action:"show3v3q"},
                success: function(data){
                    $("#content").html(data);
                }
            });
        }
        threeVthreeQ();
    });
});