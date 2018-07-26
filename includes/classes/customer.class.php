<?php

// interface Customer {
abstract class Customer {

	function add_customer() {
		echo "add cus";
	}
	function add_transaction(){

	}
	abstract public function add_bill();
}

?>