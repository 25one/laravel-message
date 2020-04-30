﻿$(document).ready(function() {

   $('body').on('click', '.button_message', function(){
      BaseRecord.guzzle($('[name="title"]').val(), $('[name="message"]').val(), $('[name="apitoken"]').val());	
   });

});

var BaseRecord={

guzzle: function(title, message, apitoken){
   var ajaxSetting={
      method: 'post',
      url: 'index.php',
      data: 'hook=Message&title='+title+'&message='+message+'&apitoken='+apitoken,
      success: function(data){
      	 //alert(data);
          $('.red').html(data);

      },
   };
   $.ajax(ajaxSetting);
},

};
