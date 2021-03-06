<?php

class ComDealersModelDealers extends ComDefaultModelDefault
{

	private $_states;

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

	}

	protected function _buildQueryOrder(KDatabaseQuery $query)
	{
		$query->order('title', 'ASC');
	}

	public function getStates()
	{
		if (!$this->_states) {
			$table = $this->getTable();
			$query = $table->getDatabase()->getQuery();

			$query
				->group('state')
				->distinct();
			$this->_states = $table->select($query);
		}

		return $this->_states;
	}


}