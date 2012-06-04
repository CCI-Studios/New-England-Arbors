<?php

class ComContestControllerRating extends ComDefaultControllerDefault
{

	protected function _actionAdd(KCommandContext $command)
	{
		$row = parent::_actionAdd($command);
		JFactory::getApplication()->redirect('index.php?option=com_contest&view=submissions&Itemid=150');

		print_r($row);
		die;

		return $row;
	}
}