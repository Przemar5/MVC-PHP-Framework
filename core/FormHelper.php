<?php


class FormHelper
{
	public static function inputBlock($type, $label, $name, $value = '', $inputAttrs = [], $divAttrs = [])
	{
		$divString = self::stringifyAttrs($divAttrs);
		$inputString = self::stringifyAttrs($inputAttrs);
		$html = '<div ' . $divString . '>';
		$html .= '<label for="' . $name . '">' . $label . '</label>';
		$html .= '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $value . '" ' . $inputString . '/>';
		$html .= '</div>';

		return $html;
	}

	public static function submitBlock($buttonText, $inputAttrs = [], $divAttrs = [])
	{
		$divString = self::stringifyAttrs($divAttrs);
		$inputString = self::stringifyAttrs($inputAttrs);
		$html = '<div ' . $divString . '>';
		$html .= '<input type="submit" value="' . $buttonText . '" ' . $inputString . '>';
		$html .= '</div>';

		return $html;
	}

	public static function submitTag($buttonText, $inputAttrs = [], $divAttrs = [])
	{
		$inputString = self::stringifyAttrs($inputAttrs);
		$html = '<input type="submit" value="' . $buttonText . '" ' . $inputString . '>';

		return $html;
	}

	public static function stringifyAttrs($attrs)
	{
		$string = '';

		foreach ($attrs as $key => $value)
		{
			$string .= ' ' . $key . ' = "' . $value . '"';
		}

		return $string;
	}
	
	public static function generateToken()
	{
		$token = base64_encode(openssl_random_pseudo_bytes(32));
		
		Session::set('csrf_token', $token);
		
		return $token;
	}
	
	public static function checkToken($token)
	{
		return Session::exists('csrf_token') && Session::get('csrf_token') == $token;
	}
	
	public static function csrfInput()
	{
		return '<input type="hidden" name="csrf_token" id="csrf_token" value="' . self::generateToken() . '"/>';
	}

	public static function sanitize($dirty)
	{
		return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
	}

	public static function posted_values($post)
	{
		$clean_array = [];

		foreach ($post as $key => $value)
		{
			$clean_array[$key] = self::sanitize($value);
		}

		return $clean_array;
	}
	
	public static function displayErrors($errors)
	{
		$html = '<div class="form-errors"><ul>';
		
		foreach ($errors as $field => $error)
		{
			$html .= '<li class="text-danger">' . $error . '</li>';
			$html .= '<script>$("document").ready(function() {' . 
					'$("#' . $field . '").parent().closest("div").addClass("has-error);' . 
					'})</script>';
		}
		
		$html .= '</ul></div>';
		
		return $html;
	}
}