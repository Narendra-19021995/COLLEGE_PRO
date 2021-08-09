<?php
//require '../profile.php';
?>
<div class="container mt-(-10)">
    <center>
        <div class="form-group">
            <div class="content">

                <head class="header">
                    <p class="text-uppercase font-weight-bold h1">Add CO</p>
                </head>
            </div>
            <form method="post" action="">
                <div class="field_wrapper">
                    <div>
                        <input type="text" name="field_name[]" class="form-control-lg" value=""
                            placeholder="Enter CO" />
                        <input type="text" name="field_name[]" value="" class="form-control-lg"
                            placeholder="Enter CO" />
                        <a href="javascript:void(0);" class="add_button" title="Add field"><i
                                class="material-icons">&#xe148;</i></a>
                    </div>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3 ">
            </form>

        </div>
    </center>

</div>
<script type="text/javascript">
$(document).ready(function() {
    var maxField = 8; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML ='<div><input type="text" name="field_name[]" class="form-control-lg" value="" placeholder="Enter CO"/><input type="text" name="field_name[]" class="form-control-lg" value="" placeholder="Enter CO"/><a href="javascript:void(0);" class="remove_button"><i class="material-icons">&#xe872;</i></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>