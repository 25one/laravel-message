$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(document).ready(function(){
  $('.button_search').click(function(){
     BaseRecord.search($('#search').val());
  });
});

var BaseRecord={

search: function(value){	
   //alert(value);
   var ajaxSetting={
      method: 'get',
      url: './',
      data: {
         search: value,
      },
      success: function(data){
         //alert(data.table);
         $('.amado-pro-catagory.clearfix').html(data.table);
      },
   };
   $.ajax(ajaxSetting);
},

removeone: function(id){  
   //alert(id);

   var ajaxSetting={
      //method: 'post',
      method: 'get', //for Policy
      url: './removeone/'+id, //for Policy
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data.table);
         //$('.amado-pro-catagory.clearfix').html(data.table);
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);

},

cart: function(){  
   //alert(value);
   var ajaxSetting={
      method: 'get',
      url: './cart',
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data.table);
         $('.cart-pannel').html(data.table);
         $('.listbuttonremove').click(function(){
            BaseRecord.removeone($(this).attr('value'));
         });         
      },
   };
   $.ajax(ajaxSetting);
},

subscribe: function(email){
   //alert(value);
   var ajaxSetting={
      method: 'post',
      url: './subscribe',
      data: {
         email: email,
      },
      success: function(data){
         //alert(data.answer);
         var data_json=JSON.parse(data.answer);
         if(data_json['mail']) alert('We sent the message on your email. Please check it!'); 

      },
   };
   $.ajax(ajaxSetting);
},

clearall: function(){
   //alert(value);
   var ajaxSetting={
      method: 'post',
      url: './clearall',
      //data: {
      //   email: email,
      //},
      success: function(data){
        BaseRecord.cart();

      },
   };
   $.ajax(ajaxSetting);
},

destroy: function(url){
   //alert(value);
   var ajaxSetting={
      method: 'delete',
      url: url,
      //data: {
      //   email: email,
      //},
      success: function(data){
        //alert(data); 
        BaseRecord.dashboard(); //!!!ajax-return to dashboard (similar to cart)

      },
   };
   $.ajax(ajaxSetting);
},

destroyMessage: function(url){
   //alert(value);
   var ajaxSetting={
      method: 'delete',
      url: url,
      //data: {
      //   email: email,
      //},
      success: function(data){
        //alert(data); 
        BaseRecord.dashboardMessages(); //!!!ajax-return to messages (similar to cart)

      },
   };
   $.ajax(ajaxSetting);
},

dashboard: function(){  
   //alert(value);
   var ajaxSetting={
      method: 'get',
      url: './dashboard', //!!!url
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data.table);
         $('.back-pannel').html(data.table); //!!!.back-pannel
         $('.listbuttonremove').click(function(){
            BaseRecord.destroy($(this).attr('href'));
            return false;
         });         
      },
   };
   $.ajax(ajaxSetting);
},

dashboardMessages: function(){  
   //alert(value);
   var ajaxSetting={
      method: 'get',
      url: './messages', //!!!url
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data.table);
         $('#pannel').html(data.table); //!!!.back-pannel
         $('.listbuttonremove').click(function(){
            BaseRecord.destroyMessage($(this).attr('href'));
            return false;
         });         
      },
   };
   $.ajax(ajaxSetting);
},

searchMessages: function(search_messages){   
   //alert(value);
   var ajaxSetting={
      method: 'get',
      url: './messages',
      data: {
         search_messages: search_messages,
      },
      success: function(data){
         //alert(data.table);
         $('#pannel').html(data.table);
      },
   };
   $.ajax(ajaxSetting);
},

};