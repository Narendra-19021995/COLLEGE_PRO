<?php
require 'profile.php';
?> 
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="bootstrap.min.css" />
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
   <div class="container">
   <h3 class="text-center">Add Course Objective</h3>
   <!-- <div align="left" class="col-md-2 mb-2">
   <input type="text" name="coid" id="coid" value="" class="form-control input-group">
   </div> -->
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
   </div>
   <br />
   <div align="center">
   
   <form method="post" id="user_form">
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="user_data">
      <tr>
       <th>Subject</th>
       <th>CO NO</th>
       <th>Course Name</th>
       <th>Edit</th>
       <th>Remove</th>
      </tr>
     </table>
    </div>
    <div align="center">
     <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Submit" />
    </div>
   </form>
   </div>

   <br />
  </div>
  <div id="user_dialog" title="Add Data">
   <div class="form-group">
    <label>Enter Subject Name</label>
    <input type="text" name="s_name" id="s_name" class="form-control" />
    <span id="error_s_name" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Enter CO No</label>
    <input type="text" name="Co_no" id="Co_no" class="form-control" />
    <span id="error_Cono" class="text-danger"></span>
   </div>

   <div class="form-group">
    <label>Enter Course Name</label>
    <input type="text" name="co_name" id="co_name" class="form-control" />
    <span id="error_co_name" class="text-danger"></span>
   </div>

   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">

  </div>

<script>  
$(document).ready(function(){ 
 
 var count = 0;

 $('#user_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#user_dialog').dialog('option', 'title', 'Add Data');
  $('#s_name').val('');
  $('#Co_no').val('');
  $('#co_name').val('');
  $('#error_s_name').text('');
  $('#error_Cono').text('');
  $('#error_co_name').text('');
  $('#s_name').css('border-color', '');
  $('#Co_no').css('border-color', '');
  $('#co_name').css('border-color', '');
  $('#save').text('Save');
  $('#user_dialog').dialog('open');
 });

 $('#save').click(function(){
  var error_s_name = '';
  var error_Cono = '';
  var error_co_name = '';
  var s_name = '';
  var Co_no = '';
  var co_name = '';
  if($('#s_name').val() == '')
  {
   error_s_name = 'Subject is required';
   $('#error_s_name').text(error_s_name);
   $('#s_name').css('border-color', '#cc0000');
   s_name = '';
  }
  else
  {
   error_s_name = '';
   $('#error_s_name').text(error_s_name);
   $('#s_name').css('border-color', '');
   s_name = $('#s_name').val();
  } 
  if($('#Co_no').val() == '')
  {
   error_Cono = 'CO NO is required';
   $('#error_Cono').text(error_Cono);
   $('#Co_no').css('border-color', '#cc0000');
   Co_no = '';
  }
  else
  {
   error_Cono = '';
   $('#error_Cono').text(error_Cono);
   $('#Co_no').css('border-color', '');
   Co_no = $('#Co_no').val();
  }
  if($('#co_name').val() == '')
  {
   error_co_name = 'Course Name is required';
   $('#error_co_name').text(error_co_name);
   $('#co_name').css('border-color', '#cc0000');
   co_name = '';
  }
  else
  {
   error_co_name = '';
   $('#error_co_name').text(error_Cono);
   $('#co_name').css('border-color', '');
   co_name = $('#co_name').val();
  }
  if(error_s_name != '' || error_Cono != ''|| error_co_name != '' )
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+s_name+' <input type="hidden" name="hidden_s_name[]" id="s_name'+count+'" class="s_name" value="'+s_name+'" /></td>';
    output += '<td>'+Co_no+' <input type="hidden" name="hidden_Co_no[]" id="Co_no'+count+'" value="'+Co_no+'" /></td>';
    output += '<td>'+co_name+' <input type="hidden" name="hidden_co_name[]" id="co_name'+count+'" value="'+co_name+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">Edit</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#user_data').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+s_name+' <input type="hidden" name="hidden_s_name[]" id="s_name'+row_id+'" class="s_name" value="'+s_name+'" /></td>';
    output += '<td>'+Co_no+' <input type="hidden" name="hidden_Co_no[]" id="Co_no'+row_id+'" value="'+Co_no+'" /></td>';
    output += '<td>'+co_name+' <input type="hidden" name="hidden_co_name[]" id="co_name'+row_id+'" value="'+co_name+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">Edit</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#user_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var s_name = $('#s_name'+row_id+'').val();
  var Co_no = $('#Co_no'+row_id+'').val();
  var co_name = $('#co_name'+row_id+'').val();
  $('#s_name').val(s_name);
  $('#Co_no').val(Co_no);
  $('#co_name').val(co_name);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#user_dialog').dialog('option', 'title', 'Edit Data');
  $('#user_dialog').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

 $('#user_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.s_name').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insertco.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#user_data').find("tr:gt(0)").remove();
     $('#action_alert').html('<p>Data Inserted Successfully</p>');
     $('#action_alert').dialog('open');
    }
   })
  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });
 
});  
</script>
