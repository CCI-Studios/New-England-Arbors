<?php

class ComDealersDispatcher extends ComDefaultDispatcher
{

	public function _initialize(KConfig $config)
	{
		$config->append(array(
			'request'	 => array('limt' => KRequest::get('get.limit', 'int', 1000))

		));

		parent::_initialize($config);
	}

}