$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var BaseRecord=(function() {

return {

userSelect: function(user_id, url){
   var ajaxSetting={
      method: 'get',
      //url: './', //./dashboard
      url: url,
      data: {
         type: user_id, //$request->type
      },
      success: function(data){
          //alert(data);
          $('#pannel').html(data.table);
          $('.listbuttonremove').click(function(){
             BaseRecord.destroy($(this).attr('id'));
             return false;
          });         
      },
      error: function(data){
         alert(data.responseText);
      },
   };
   $.ajax(ajaxSetting);
},

destroy: function(user_id){
   var ajaxSetting={
      method: 'delete',
      url: './messages/'+user_id, 
      success: function(data){
          //alert(data);
          //BaseRecord.userSelect(0, './dashboard');
          $('#pannel').html(data.table);
          $('.listbuttonremove').click(function(){
             BaseRecord.destroy($(this).attr('id'));
             return false;
          });                  
      },
      error: function(data){
         alert(data.responseText);
      },
   };
   $.ajax(ajaxSetting);
},

}

})();