<script>
/*
 See the full details here: 
 http://www.snipe.net/2012/02/jquery-mobile-add-remove-fields-dynamically/
Based on the great post by Charlie Griefer, available here:
http://charlie.griefer.com/blog/2009/09/17/jquery-dynamically-adding-form-elements/
*/


$(document).ready(function() {
             
   
    $('#btnAdd').click( function() {
         
        $('#btnDel').removeAttr('disabled').button('enable');	// enable the "del" button
        
        // how many "duplicatable" input fields we currently have
        var num = $('.clonedInput').length;	
        
        // the numeric ID of the new input field being added	
        var newNum	= new Number(num + 1);		
        var newElem = $('#input' + num ).clone().attr('id', 'input' + newNum);
                                 
        newElem.children(':first').attr( 'id', 'name' + newNum ).attr('name', 'name_label[]');
        $('#input' + num).after(newElem);
        
        
        // business rule: limit the number of fields to 5
        if (newNum == 5) {
             $('#btnAdd' ).attr('disabled', 'disabled').button('disable');
             $('#btnAdd').parent().find('.ui-btn-text').text('maximum fields reached');
        }                        
    });

    $( '#btnDel' ).click( function() {
        // how many "duplicatable" input fields we currently have           
        var num = $( '.clonedInput' ).length;	
        
        // remove the last element	
        $('#input' + num ).remove();
        
        // enable the "add" button, since we've removed one				
        $('#btnAdd').removeAttr('disabled').button('enable');	
        $('#btnAdd').parent().find('.ui-btn-text').text('add another name');
        
        // if only one element remains, disable the "remove" button
        if ( num-1 == 1 )
        $('#btnDel' ).attr('disabled', 'disabled').button('disable');

    });  
   
});           
</script>  


<!-- Here is the form -->

  <form action="#" method="post">
          <div id="input1" class="clonedInput" style="margin-bottom: 4px;">
              <label for="field_name" class="ui-hidden-accessible">Name:</label>
              <input type="text" name="name_label[]" id="name1" value="" placeholder="Name">
          </div>
          <div>
              <input id="btnAdd" type="button" value="add another name">
              <input id="btnDel" type="button" value="remove name" disabled="disabled">
          </div>
 </form>