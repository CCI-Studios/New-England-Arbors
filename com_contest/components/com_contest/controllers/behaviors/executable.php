<?php

class ComContestControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{

	public function canAdd()
	{
		$name = $this->getMixer()->getIdentifier()->name;

		if ($name === 'submission') {
			return true;
		} else if ($name === 'rating') {
			return true;
		}

		return parent::canAdd();
	}

}