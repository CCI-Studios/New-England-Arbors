<?php

class ComContestDispatcher extends ComDefaultDispatcher
{

	public function _initialize(KConfig $config)
	{
		$config->append(array(
			'controller' => 'submissions'
		));

		parent::_initialize($config);
	}

}