<?php

class T1 extends TestCase {
	public function getRootTest()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

}
