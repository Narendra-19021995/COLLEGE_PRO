<!DOCTYPE html>
<html>
<title>Page Title</title>

<body>
<?php $row_num=1;?>
<table class="table table-responsive">
   <thead>
   <tr>
     <th>Info.</th>
     <th>Medicine Name</th>
     <th>Quantity</th>
     <th>Unit/Price</th>
     <th>Total</th>
     <th>Action</th>
    </tr>
    </thead>
    <tbody class="row_container">
            
    <tr id="div_{{$row_num}}">
       <td>
          <a href="javascript:0" class="btn btn-warning"><i class="fa fa-info-circle"></i></a> 
       </td> 
       <td>
          <input type="text" name="medicine_name" class="form-control" placeholder="Medicine Name">
       </td>         
       <td>
          <input type="text" name="quantity" class="form-control" placeholder="Quantity">
       </td>         
       <td>
          <input type="text" name="unit_price" class="form-control" placeholder="Unit Price">
       </td>
       <td>
          <input type="text" name="total" class="form-control" placeholder="Total">
       </td>
       <td>
          <a href="javascript:0" class="btn btn-danger"><i class="fa fa-minus" onclick="$('#div_{{$row_num}}').remove();"></i></a>
       </td>
     </tr>
    </tbody>
</table>
</body>
</html>
<script type="text/javascript">
  var RowNum = '{{$row_num}}';
  function addrow(){
    RowNum++;
    var html = "";
    html += '<tr id="div_'+RowNum+'">';
    html +='<td>';
    html +='<a href="javascript:0" class="btn btn-warning"><i class="fa fa-info-circle"></i></a>'; 
    html +='</td>'; 
    html +='<td>';
    html +='<input type="text" name="medicine_name" class="form-control" placeholder="Medicine Name">';
    html +='</td>';         
    html +='<td>';
    html +='<input type="text" name="quantity" class="form-control" placeholder="Quantity">';
    html +='</td>';         
    html +='<td>';
    html +='<input type="text" name="unit_price" class="form-control" placeholder="Unit Price">';
    html +='</td>';
    html +='<td>';
    html +='<input type="text" name="total" class="form-control" placeholder="Total">';
    html +='</td>';
    html +='<td>';
    html +='<a href="javascript:0" class="btn btn-danger"><i class="fa fa-minus"  onclick="$(\'#div_'+RowNum+'\').remove();"></i></a>';
    html +='</td>';
    html +='</tr>';

    $('.row_container').append(html);
  }
</script>