$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<td><input class="input_fields_wrap" type="text" name="mytext[]"/><td><span style="margin-left:40px;" class="de; glyphicon glyphicon-remove"></span></td>'); //add input box
        }
    });
    
    $(wrapper).on("click",".del", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('tr').remove(); x--;
    })
});