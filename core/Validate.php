<?php


class Validate
{
	private $_passed = false, $_errors = [], $_db = null;
	
	
	public function __construct()
	{
		$this->_db = DB::getInstance();
	}
	
	public function check($source, $items = [])
	{
		$this->_errors = [];
		
		foreach ($items as $item => $rules)
		{
			$item = Input::sanitize($item);
			$display = $rules['display'];
			
			foreach ($rules as $rule => $ruleValue)
			{
				$value = Input::sanitize(trim($source[$item]));
				
				if ($rule === 'required' && empty($value))
				{
					$this->addError([
						$display . ' is required.',
						$item
					]);
				}
				else if (!empty($value))
				{
					switch ($rule)
					{
						case 'min':
							if (strlen($value) < $ruleValue)
							{
								$this->addError([
									$display . ' must be a minimum of ' . $ruleValue . ' characters.',
									$item
								]);
							}
							break;
							
						case 'max':
							if (strlen($value) > $ruleValue)
							{
								$this->addError([
									$display . ' must be a maximum of ' . $ruleValue . ' characters.',
									$item
								]);
							}
							break;
							
						case 'matches':
							if ($value != $source[$ruleValue])
							{
								$match = $items[$ruleValue]['display'];
								$this->addError([
									$matchDisplay . ' and ' . $display . ' must match.',
									$item
								]);
							}
							break;
							
						case 'unique':
							$sql = 'SELECT ' . $item . ' FROM ' . $ruleValue . ' WHERE ' . $item . ' = ?';
							$check = $this->_db->query($sql, [$value]);
							if ($check->count())
							{
								$this->addError([
									$display . ' already exists. Please choose another ' . $display . '.',
									$item
								]);
							}
							break;
							
						case 'unique_update':
							$t = explode(',', $ruleValue);
							$table = $t[0];
							$id = $t[1];
							$sql = 'SELECT * FROM ' . $table . ' WHERE id != ? AND ' . $item . ' = ?';
							$query = $this->_db->query($sql, [$id, $value]);
							
							if ($query->count())
							{
								$this->addError([
									$display . 'already exists. Please choose another ' . $display . '.',
									$item
								]);
							}
							break;
							
						case 'is_numeric':
							if (!is_numeric($value)) 
							{
								$this->addError([
									$display . ' has to be a number. Please use a numeric value.',
									$item
								]);
							}
							break;
							
						case 'valid_email':
							if (!filter_var($value, FILTER_VALIDATE_EMAIL))
							{
								$this->addError([
									$display . ' must be a valid email address.'.
									$item
								]);
							}
							break;
					}
				}
			}
		}
		
		if (empty($this->_errors)) 
		{
			$this->passed = true;
		}
		
		return $this;
	}
	
	public function addError($error)
	{
		$this->_errors[] = $error;
		
		if (empty($this->_errors))
		{
			$this->_passed = true;
		}
		else 
		{
			$this->_passed = false;
		}
	}
	
	public function errors()
	{
		return $this->_errors;
	}
	
	public function passed()
	{
		return $this->_passed;
	}
	
	public function displayErrors()
	{
		$html = '<ul>';
		
		foreach ($this->_errors as $error)
		{
			if (is_array($error))
			{
				$html .= '<li class="text-danger">' . $error[0] . '</li>';
				$html .= '<script>$("document").ready(function() {' . 
						'$("#' . $error[1] . '").parent().closest("div").addClass("has-error);' . 
						'})</script>';
			}
			else 
			{
				$html  .= '<li class="text-danger">' . $error . '</li>';
			}
		}
		
		$html .= '</ul>';
		
		return $html;
	}
}