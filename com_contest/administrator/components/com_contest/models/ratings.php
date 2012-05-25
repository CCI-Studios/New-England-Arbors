<?php

class ComContestModelRatings extends ComDefaultModelDefault
{

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('contest_submission_id', 'int')
			->insert('ip', 'ip');
	}

	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

		if (is_numeric($state->contest_submission_id)) {
			$query->where('contest_submission_id', '=', $state->contest_submission_id);
		}

		if (isset($state->ip)) {
			$query->where('ip', '=', $state->ip);
		}

		parent::_buildQueryWhere($query);
	}

}