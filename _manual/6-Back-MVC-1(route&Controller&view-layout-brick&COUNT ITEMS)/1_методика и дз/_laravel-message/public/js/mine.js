$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var BaseRecord=(function() {

return {

userSelect: function(user_id){
   var ajaxSetting={
      method: 'get',
      url: './',
      data: {
         type: user_id, //$request->type
      },
      success: function(data){
         //alert(data);
         $('#pannel').html(data.table);
      },
      error: function(data){
         alert(data.responseText);
      },
   };
   $.ajax(ajaxSetting);
},



}

})();