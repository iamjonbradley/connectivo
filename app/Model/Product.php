<?php

class Product extends AppModel {
	
	var $name = 'Product';
	
	function getList() {
		// Structure products
		$products = $this->find('list', array('fields' => array('Product.id', 'Product.name')));
		foreach($products as $key => $value):
			$product[$key] = ucwords(strtolower($value));
		endforeach;
		$product[null] = 'Select Product';
		ksort($product);
		return $product;
	}
		
}
?>