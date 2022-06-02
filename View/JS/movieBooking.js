$(document).ready(function() {
    
    var id = $("#movieId").val();
    // var date = $("#datee").val();
    // console.log(date);
    

    $("#showDate").on("change", function() {
        var dt = $("#showDate option:selected").val();
        //alert(date);

        $('#showTime').remove();
        $("#seats").remove();
        $("#submitButton").remove();

        $.ajax (
             {
                type:"get",
                url: 'Model/JQuery/book.php',
                data: {
                    date: dt,
                    movieId: id
                },
                success:function(data) {
                    $("#mainForm").append(data);
                }
             }

        )
    })
})