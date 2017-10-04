<?PHP

	require '../../config.php';
	
	// FORM POSTED - GET PACK RESULTS
	if (isset($_POST['num_bananas']) && isset($pack_sizes)) {
		
		$num_bananas_required = (int) $_REQUEST['num_bananas'];
		if ($num_bananas_required > 0) {
			require '../classes.php';
			$pack_calc = new PackCalculator($pack_sizes);
			$pack_calc->setRequiredAmount($num_bananas_required);
			$pack_results = $pack_calc->getResults();
		}
		
	}
	
	if (isset($pack_results)) {
?>
<div class="container">
	<div class="table-responsive">
	   <table class="table">
		  <caption><?PHP echo $num_bananas_required; ?> bananas</caption>
		  <thead>
			 <tr>
				<th>Pack Size</th>
				<th>Amount</th>
			 </tr>
		  </thead>
		  <tbody>
			<?PHP
				foreach ($pack_results as $k => $v) {
					echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
				}
			?>
		  </tbody>
	   </table>
	</div>
</div>
<?PHP
	}
?>
