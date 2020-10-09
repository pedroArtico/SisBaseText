$(document).ready(function(){
    $('#option').on('change',function(){
        var optionValue = $(this).val();
		if(optionValue=="0" || optionValue== "1" || optionValue== "2" || optionValue== "3")
		{
			$('#url_name').val('').trigger('change');
			$('#url_register').val('').trigger('change');		
			$('#sources').val('0').trigger('change');
		}
		
		if(optionValue== "1")
		{
			$("#url_name").attr("placeholder", "Insira o nome da fonte").val("").focus().blur();
			$("#url_register").attr("placeholder", "Insira a URL da fonte").val("").focus().blur();		
		}

		if(optionValue== "2")
		{
			$("#url_name").attr("placeholder", "").val("").focus().blur();
			$("#url_register").attr("placeholder", "").val("").focus().blur();		
		}
    });
});