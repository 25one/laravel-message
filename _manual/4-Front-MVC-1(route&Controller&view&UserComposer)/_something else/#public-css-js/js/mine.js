$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


var BaseRecord=(function() {

//alert('hi');

return {

typeSelect: function(type_id, url){
   var ajaxSetting={
      method: 'get',
      //url: '/',
      url: url,
      data: {
         type: type_id,	
      },
      success: function(data) {
         $('#pannel').html(data.table);	
          $('.listbuttonremove').click(function(){
             BaseRecord.destroy($(this).attr('href'));
             return false;
          });         
      },
   };
   $.ajax(ajaxSetting);
},

destroy: function(url){
   var ajaxSetting={
      method: 'delete',
      url: url,
      //data: {
      //   type: type_id, 
      //},
      success: function(data) {
         //alert(data);
         BaseRecord.typeSelect(0, '/dashboard');
      },
   };
   $.ajax(ajaxSetting);
},

}

})();