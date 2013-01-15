<?php

class ComContestViewSubmissionsHtml extends ComDefaultViewHtml
{

	public function display()
	{
		$year = KRequest::get('get.year', 'int', date('Y'));
		$this->assign('year', $year);
		$model = $this->getModel();
		$model->set('year', $year);

		$this->assign('archive', ($year != date('Y'))); // archive if year != current year

		$menu = JSite::getMenu();
		$itemid = KRequest::get('get.Itemid', 'int');
		if ($itemid) {
			$params = $menu->getParams($itemid);
			$description = str_replace("\n\n", "<br/><br/>", $params->get('description'));
		}
		$this->assign('description', $description);

		$this->assign('archive_itemid', '164');
		$this->assign('listing_itemid', '150');

		return parent::display();
	}

}