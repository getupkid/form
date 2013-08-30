<?php namespace AdamWathan\Form\Elements;

class Select extends FormControl
{
	private $options;

	public function __construct($name, $options = array())
	{
		$this->setName($name);
		$this->setId($name);
		$this->setOptions($options);
	}

	protected function setOptions($options)
	{
		$this->options = $options;
	}

	public function options($options)
	{
		$this->setOptions($options);
	}

	public function render()
	{
		$result = '<select';
		$result .= $this->renderAttributes();
		$result .= '>';
		$result .= $this->renderOptions();
		$result .= '</select>';

		return $result;
	}

	protected function renderOptions()
	{
		$result = '';
		$count = 0;
		
		foreach ($this->options as $value => $label) {
			$value = $count === $value ? $label : $value;
			$option = '<option ';
			$option .= 'value="' . $value . '">';
			$option .= $label;
			$option .= '</option>';
			$result .= $option;
			$count++;
		}

		return $result;
	}

	public function addOption($value, $label)
	{
		$this->options[$value] = $label;
	}
}