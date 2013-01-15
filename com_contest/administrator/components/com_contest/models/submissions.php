<?php

class ComContestModelSubmissions extends ComDefaultModelDefault
{

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('enabled', 'int')
			->insert('year', 'int');
	}

	protected function _buildQueryOrder(KDatabaseQuery $query)
	{
		if (!$this->_state->sort) {
			$query->order('created_on', strtoupper($this->_state->direction));
		}

		parent::_buildQueryOrder($query);
	}

	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

		if (is_numeric($state->enabled)) {
			$query->where('enabled', '=', $state->enabled);
		}

		if (is_numeric($state->year)) {
			$query->where('YEAR(created_on)', '=', $state->year);
		}

		//echo $query;

		parent::_buildQueryWhere($query);
	}

}