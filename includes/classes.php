<?PHP

	/*
		PACK SIZE CALCULATOR
	*/
	class PackCalculator {
		
		// VARS
		private $pack_amounts = array();
		private $required_amount = 0;
		private $remaining_required = 0;
		private $pack_results = array();
		
		// CONSTRUCTOR
		public function packCalculator ($pack_amounts = array()) {
			if (is_array($pack_amounts)) {
				rsort($pack_amounts);
				$this->pack_amounts = $pack_amounts;
			}
		}
		
		// SET REQUIRED AMOUNT
		public function setRequiredAmount ($req_amount) {
			if (is_numeric($req_amount)) {
				$this->required_amount = (int) $req_amount;
				$this->remaining_required = $this->required_amount;
				$this->pack_results = array();
				$this->calculatePacks();
			}
		}
		
		// RETURN RESULTS
		public function getResults () {
			return $this->pack_results;
		}
		
		// PERFORM CALCULATION
		private function calculatePacks () {
			if ($this->required_amount > 0) {
				$this->remaining_required = $this->required_amount;
				// get smallest suitable pack size
				for ($i = 0; $i < count($this->pack_amounts); $i++) {
					if ($this->remaining_required > 0) {
						$tmp_array = array();
						foreach ($this->pack_amounts as $pack_size) {
							if ($pack_size <= $this->remaining_required) {
								$tmp_array[] = array($pack_size, floor($this->remaining_required / $pack_size));
							}
						}
						if (isset($tmp_array[0])) {
							$this->pack_results[] = $tmp_array[0];
							$this->remaining_required = $this->remaining_required - ($tmp_array[0][0] * $tmp_array[0][1]);
						} else {
							break;
						}
					}
				}
				// handle small amount of remaining items
				if ($this->remaining_required > 0) {
					sort($this->pack_amounts );
					foreach ($this->pack_amounts as $amt) {
						if ($amt >= $this->remaining_required) {
							$this->pack_results[] = array($amt, 1);
							break;
						}
					}
				}
				// check results for duplicate sized packs and consolidate
				$result_array = array();
				for ($i = 0; $i < count($this->pack_results); $i++) {
					if (isset($result_array[$this->pack_results[$i][0]])) {
						$result_array[$this->pack_results[$i][0]]++;
					} else {
						$result_array[$this->pack_results[$i][0]] = $this->pack_results[$i][1];
					}
				}
				$result_items = count($result_array);
				if ($result_items > 0) {
					foreach ($result_array as $k => $v) {
						if (in_array(($k * $v), $this->pack_amounts) && $v > 1) {
							$new_pack_size = $k * $v;
							$result_array[$new_pack_size] = (isset($result_array[$new_pack_size])) ? $result_array[$new_pack_size] + 1 : 1;
							unset($result_array[$k]);
						}
					}
					$this->pack_results = $result_array;
				} else {
					$this->pack_results = array();
				}
			}
		}
	}

?>