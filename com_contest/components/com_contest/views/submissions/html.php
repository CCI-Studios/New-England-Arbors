<?php

class ComContestViewSubmissionsHtml extends ComDefaultViewHtml
{

	public function display()
	{
		$menu = JSite::getMenu();
		$itemid = KRequest::get('get.Itemid', 'int');
		if ($itemid) {
			$params = $menu->getParams($itemid);
			$description = str_replace("\n\n", "<br/><br/>", $params->get('description'));
		}

		$this->assign('description', $description);

		return parent::display();
	}

}