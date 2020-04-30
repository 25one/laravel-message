$(document).ready(function() {

   $('.button_message').click(function(){
      BaseRecord.message($('[name="title"]').val(), $('[name="message"]').val());
   });

});

var BaseRecord={

   message: function(title, message){
      var ajaxSetting={
        method: 'post',
        url: 'index.php',
        data: {
           hook: 'Message',
           title: title,
           message: message,
        },
        success: function(data){
           //alert(data);
           $('span.red').html(data);
        },
        error: function(data){
           alert(data.responseText); 
        },
      };
      $.ajax(ajaxSetting);
   },

};
