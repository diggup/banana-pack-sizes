	$(document).ready(function() {

		var timeoutID = null;

		function ajaxCalcBananas (num) {
			$.ajax({
				type: "POST",
				url: "includes/ajax/banana_packs.php",
				data: {'num_bananas' : '' + num + ''},
				dataType: "text",
				cache: false,
				success: function(data) {
					if (data.trim() != '') {
						$("#displayResults").hide();
						$('#displayResults').html(data);
						$('#displayResults').fadeIn();
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
				}
			});
		}
		
		function doAjaxBananaCalc (e) {
		  clearTimeout(timeoutID);
		  timeoutID = setTimeout(() => ajaxCalcBananas(e.target.value), 700);
		}
		
		$('#num_bananas').keyup(function(e) {
			doAjaxBananaCalc(e);
		});
		
		$('#btnCalc').click(function() {
			$('#num_bananas').keyup();
		});

	});
