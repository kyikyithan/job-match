function tblreload()
{
    var table = $('#tbl-searchlist').DataTable();
    //table.ajax.reload( callback, resetPaging )
    table.ajax.reload(null,true);
}

$(document).ready(function() {
  $('#tbl-searchlist').DataTable({
      'serverSide': true,
      'ajax':{
          'url':baseurl+'/index.php/home/load_data',
          'type': 'POST',
          'data': function(d) {
               var frmdata = $('#search-form').serializeArray();
               $.each(frmdata, function(key, val) {
                 d[val.name] = val.value;
             });
           }
      },
      'JQueryUI': true,
      'responsive': true,
  });

  $( '#btn-search' ).click(function() {
      tblreload();
  });
});
