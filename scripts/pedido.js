/*document.onbeforecopy = function() {return false};
document.ondragstart = function() {return false};
document.onselectstart = function() {return false};
document.oncontextmenu = function() {return false};*/


	var bIsFirebugReady = (!!window.console && !!window.console.log);

	function recalc(id){
	
	if ($("#"+id).is(":checked")) {
		$("#ptotal"+id).calc(
			// the equation to use for the calculation
			"qty * price",
			// define the variables used in the equation, these can be a jQuery object
			{
				qty: $("#cant"+id),
				price: $("#precio"+id)
			},
			// define the formatting callback, the results of the calculation are passed to this function
			function (s){
				// return the number as a dollar amount
				return s.toFixed(2);
				$("#ptotal"+id).val(s);
			},
			// define the finish callback, this runs after the calculation has been complete
			
			function ($this){
				// sum the total of the $("[id^=ptotal]") selector
				var sum = 0;
				$(".field-pedidos-total").each(function() {
                    sum += Number($(this).val());
                });
				
				$("#iva").val(
					(sum*0.12).toFixed(2)
				);
				
				$("#granTotal").val(
					(sum+(sum*0.12)).toFixed(2)
				);
			}
		);
	}
	else {
	$("#ptotal"+id).val("");
	
				var sum = 0;
				$(".field-pedidos-total").each(function() {
                    sum += Number($(this).val());
                });
				
				$("#iva").val(
					(sum*0.12).toFixed(2)
				);
				
				$("#granTotal").val(
					(sum+(sum*0.12)).toFixed(2)
				);
	
	}
  }