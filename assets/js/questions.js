jQuery(document).ready(function($){
	$('#upform').hide();

	$('#quesnumok').click(function() {
		var options = "";
		var options1 = "<input type='submit' value='Submit'><br><br>";
		var number = parseInt($('#numques').val(), 10);
		//alert(number);
        for (var i = 0; i < number; i++) {
		options+="<b>Question:</b><br><input name='upload[question][]' type='text' width='600' height='400'><br>OptionA:<br><input name='upload[optiona][]' type='text'><br><br>OptionB:<br><input name='upload[optionb][]' type='text'><br><br>OptionC:<br><input name='upload[optionc][]' type='text'><br><br>OptionD:<br><input name='upload[optiond][]' type='text'><br><br>Answer:<br><input name='upload[answer][]' type='text'><br><br>Tag:<br><input name='upload[tag][]' type='text'><br><br>Explanation :) :<br><input name='upload[explain][]' type='text'><br><br><br>";        	
        };
        $('#upform').show();
        $('.upForm').html(options);
        $('.upForm').append(options1);
	});

});