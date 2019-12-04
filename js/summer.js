$(document).ready(function() {
    $("#btn-postnews").click(function() {
        
        // var data = $("#post-news").serialize();
        var data = $('#summernote').summernote();

        function News() {
            $.ajax({
                type : "POST",
                url  : "functions/postnews.php",
                data : data,
                success: function(data){
                    $("#success").html("sukses broo!");
                    // $("#summernote").html("");
                }
            });
        }
        News();
    });
  });