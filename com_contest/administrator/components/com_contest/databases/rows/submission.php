<?php

class ComContestDatabaseRowSubmission extends KDatabaseRowDefault
{
	protected $_hasRated;

	public function hasRated()
	{
		if (!$this->_hasRated) {
			$model = $this->getService('com://admin/contest.model.ratings');
			$model->set('contest_submission_id', $this->id);
			$model->set('ip', KRequest::get('server.REMOTE_ADDR', 'raw'));
			$ratings = $model->getList();

			$this->_hasRated = $ratings->count() > 0;
		}

		return $this->_hasRated;
	}
}