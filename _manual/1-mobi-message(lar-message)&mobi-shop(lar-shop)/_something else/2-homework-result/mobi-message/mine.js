$(document).ready(function() {

   $('body').on('click', '.button_message', function(){
      BaseRecord.guzzle($('[name="title"]').val(), $('[name="message"]').val());	
   });

});

var BaseRecord={

guzzle: function(title, message){
   var ajaxSetting={
      method: 'post',
      url: 'index.php',
      data: 'hook=Message&title='+title+'&message='+message,
      success: function(data){
      	 //alert(data);
         $('.red').html(data);
      },
   };
   $.ajax(ajaxSetting);
},

};
