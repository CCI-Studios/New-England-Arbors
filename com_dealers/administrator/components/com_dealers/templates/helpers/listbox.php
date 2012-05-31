<?php

class ComDealersTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
	public function optionSelect( $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
		            'name'      => null,
		            'attribs'   => array(),
		            'deselect'  => true,
		            'prompt'    => '- Select -',
		))->append(array(
		            'selected'  => $config->{$config->name}
		));

		$options = array();

		if($config->deselect) {
			$options[] = $this->option(array('text' => JText::_($config->prompt), 'value' => ''));
		}

		$options[] = $this->option(array('text' => 'Yes', 'value' => 1));
		$options[] = $this->option(array('text' => 'No', 'value' => 0));

		$config->options = $options;

		return $this->optionlist($config);
	}

	public function states($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
		            'name'      => null,
		            'attribs'   => array(),
		            'deselect'  => true,
		            'prompt'    => '- Select -',
		))->append(array(
		            'selected'  => $config->{$config->name}
		));

		$model = $this->getService('com://site/dealers.model.dealers');
		echo 'got model'; die;
		//$states = $model->getStates();

		$options = array();
		$options[] = $this->option(array('text' => JText::_($config->prompt), 'value' => ''));

		foreach($states as $state) {
			$options[] = $this->option(array('text' => JText::_($state->state), 'value' => $state->state));
		}

		$config->options = $options;

		return $this->optionlist($config);
	}
}