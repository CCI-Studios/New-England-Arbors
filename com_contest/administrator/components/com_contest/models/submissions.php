<?php

class ComContestModelSubmissions extends ComDefaultModelDefault
{

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('enabled', 'int');
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

		parent::_buildQueryWhere($query);
	}

}