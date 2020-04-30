$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var BaseRecord=(function() {

return {

/*
datatable: function(){
        var data_json=JSON.parse(messages);
        var dataSet=[];
        for(var i in data_json) {
           var ds=[];
           for(j in data_json[i]) {
              if(j!='id') {
                 ds.push(data_json[i][j]);
              }
              if(j=='id') ds.unshift('<a class="btn btn-danger listbuttonremove" id="" href="?page=start&hook=RemoveUser/'+data_json[i][j]+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>');
              if(j=='id') ds.unshift('<a class="btn btn-primary listbuttonupdate" id="" href="?page=add&hook=UpdateUserView/'+data_json[i][j]+'"><i class="fa fa-edit" aria-hidden="true"></i></a>');                                              
           }
           dataSet.push(ds);
        }

        $('.table-wrapper').DataTable({
          data: dataSet,
          "order": [[2, 'asc']],
          "columnDefs": [
            { "width": "1%", "targets": [0,1] },
            { "orderable": false, "targets": [0,1] },
          ],
          columns: [
              { title: "" },  
              { title: "" },                       
              { title: "User Name" },
              { title: "Title" },
              { title: "Message" },
              { title: "Date of vivit" },
           ],
        });
}, 
*/ 

order: 'datevisit',
direction: 'desc',
changeduser: 0,

userSelect: function(user_id, url){
   var ajaxSetting={
      method: 'get',
      //url: './', //./dashboard
      url: url,
      data: {
         //type: user_id, //$request->type
         changeduser: user_id,
         order: BaseRecord.order,
         direction: BaseRecord.direction,         
      },
      success: function(data){
          //alert(data);
          $('#pannel').html(data.table);
          $('#pagination').html(data.pagination); //!!!          
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
         //alert(data.responseText);
         var data_json=JSON.parse(data.responseText);
         alert(data_json['message']);
      },
   };
   $.ajax(ajaxSetting);
},

}

})();