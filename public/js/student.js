$(document).ready(function(){

  $('#sel_city').change(function(){
   var id = $(this).val();

   $('#sel_schools').find('option').not(':first').remove();

   $.ajax({
     url: 'getStudents/' + id,
     type: 'get',
     dataType: 'json',
     success: function(response){
       var len = 0;
       if(response['data'] != null){
         len = response['data'].length;
       }

       if(len > 0){
        
         for(var i = 0; i < len; i++){

          var id = response['data'][i].id;
          var name = response['data'][i].name;

          var option = "<option value='" + id + "'>" + name + "</option>"; 

          $("#sel_schools").append(option); 
        }
      }

    }
  });
 });
});