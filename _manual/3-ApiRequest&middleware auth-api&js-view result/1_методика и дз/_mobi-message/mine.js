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
           //$('span.red').html(data);
           if(data.indexOf('Login')==-1){
           var data_json=JSON.parse(data);
           //if(data_json=JSON.parse(data)) {
           var result='';
           if(data_json['id']){
              result+='Your message has been successfully added: '+'\n';
              $('[name="title"]').val('');
              $('[name="message"]').val('');
           } else {
              result+='You have the mistakes of validation: '+'\n';
           }
           for(var i in data_json){
              result+=i+' - '+data_json[i]+'\n';  
           }
           alert(result);
           } else {
              alert('Sorry... You have bad token!'); 
              $('[name="title"]').val('');
              $('[name="message"]').val('');              
           }
        },
        error: function(data){
           alert(data.responseText); 
        },
      };
      $.ajax(ajaxSetting);
   },

};
