<?php


class EmailValidator extends CustomValidator
{
	public function runValidation()
	{
		$value = $this->_model->{$this->field};
		$pass = true;
		
		if (!empty($email))
		{
			$pass = filter_var($email, FILTER_VALIDATE_EMAIL);
		}
		
		return $pass;
	}
}