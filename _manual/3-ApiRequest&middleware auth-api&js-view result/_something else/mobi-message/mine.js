$(document).ready(function() {
   $('body').on('click', '.button_message', function(){BaseRecord.guzzle($('[name="title"]').val(), $('[name="message"]').val());});
});

var BaseRecord={
   guzzle: function(title, message){
      var ajaxSetting={
         method: 'post',
         url: 'index.php',
         data: 'hook=Message&title='+title+'&message='+message,
         success: function(data){
            //alert(data);
            //$('.result_api').html(data);
            var data_json=JSON.parse(data);
            if(data_json['id']) {
               alert('Your message has been successfully sent!');
            } else {
               var errors='';
               for(var i in data_json) {
                  errors+=i+': '+data_json[i]+ '\n';
               }
               alert(errors);
            }
         }, 
      };
      $.ajax(ajaxSetting);
   },
};
