<?php

class ComContestDispatcher extends ComDefaultDispatcher
{

	public function _initialize(KConfig $config)
	{
		$config->append(array(
			'controller' => 'submissions',
			'request'	 => array('enabled' => KRequest::get('get.enabled', 'boolean', true))

		));

		parent::_initialize($config);
	}

}