<?php

class ComDealersModelDealers extends ComDefaultModelDefault
{

	private $_states;

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

	}

	public function getStates()
	{
		if (true || !$this->_states) {
			$table = $this->getTable();
			$query = $table->getDatabase()->getQuery();

			$query
				->select('state')
				->order('state')
				->distinct();

			echo $query;
			die;
			$this->_states = $table->select($query);
		}

		return $this->_states;
	}


}