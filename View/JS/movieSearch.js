$(document).ready(function() {
    
    function load_data(data) {

        $.ajax(
            {
                type: 'post',
                url: 'Model/JQuery/toSearch.php',
                data:{
                  string:data
                },
                success: function(data) {
                    $('#searchResult').html(data)
                    .css('background-color', 'white')
                    .css('text-decoration', 'none');
                    
                }

            });
    }


    $('#toSearch').keyup(function() {
        
      var input = $(this).val();
        //alert(input);

      if(input != '') {
      
            load_data(input);
      }
      else {
        $('#searchResult').html("");
        
      }
      
    })
})