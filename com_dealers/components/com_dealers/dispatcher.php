<?php

class ComDealersDispatcher extends ComDefaultDispatcher
{

	public function _initialize(KConfig $config)
	{
		$config->append(array(
			'request'	 => array('limt' => 1000)

		));

		parent::_initialize($config);
	}

}