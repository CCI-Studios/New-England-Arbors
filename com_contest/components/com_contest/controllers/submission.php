<?php

class ComContestControllerSubmission extends ComDefaultControllerDefault
{

	protected function _actionAdd(KCommandContext $command)
	{
		$row = parent::_actionAdd($command);
		$this->setRedirect('index.php?option=com_contest&view=submission');

		return $row;
	}
}