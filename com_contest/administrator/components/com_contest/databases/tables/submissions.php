<?php

class ComContestDatabaseTableSubmissions extends KDatabaseTableAbstract
{

	public function _initialize(KConfig $config)
	{
		$uploadable = $this->getService('com://admin/contest.database.behavior.uploadable', array(
			'columns' 	=> array('file'),
			'location'	=> 'media/com_contest/uploads/'
		));

		$config->append(array(
			'name'		=> 'contest_view_submissions',
			'base'		=> 'contest_submissions',
			'behaviors' => array('creatable', 'modifiable', $uploadable),
		));

		parent::_initialize($config);
	}
}