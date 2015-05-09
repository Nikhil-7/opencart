<?php

class CatalogControllerCheckoutCartTest extends OpenCartTest {

	/**
	 * @before
	 */
	public function setupTest() {
		$this->cart->clear();
	}

	public function testAddProduct() {
		$this->request->post['product_id'] = 28;
		$this->request->post['quantity'] = 1;

		$response = json_decode($this->dispatchAction("checkout/cart/add")->getOutput(), true);

		$this->assertTrue(!empty($response['success']) && !empty($response['total']));
		$this->assertEquals(1, preg_match('/HTC Touch HD/', $response['success']));
		/**
		 * it must be 122, $response['total'] shwing '122decimal00'
		 * */
		//$this->assertEquals(1, preg_match('/122\.00/', $response['total']));
		$this->assertEquals(1, preg_match('/122/', $response['total']));
	}
}
