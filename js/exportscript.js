// Code goes here

$(document).ready(function(){
  var table = $('#example').DataTable();
  
  $('#btn-export').on('click', function(){
      $('<table>').append(table.$('tr:visible').clone()).table2excel({
          exclude: ".excludeThisClass",
          name: "Worksheet Name",
          filename: "Table" //do not include extension
      });
  });      
})
