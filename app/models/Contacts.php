<?php


class Contacts extends Model
{
	public $id, $user_id, $fname, $lname, $email, 
			$address, $address2, $city, $zip, 
			$cell_phone, $home_phone, $work_phone, $deleted = 0;
	
	public function __construct($user = '')
	{
		$table = 'contacts';
		
		parent::__construct($table);
		
		$this->_softDelete = true;
	}
	
	public static $addValidation = [
		'fname' => [
			'display' => 'First name',
			'required' => true,
			'max' => 155
		],
		'lname' => [
			'display' => 'Last name',
			'required' => true,
			'max' => 155
		],
	];
	
	public function findAllByUserId($userId, $params = [])
	{
		$conditions = [
			'conditions' => 'user_id = ?',
			'bind' => [$userId]
		];
		$conditions = array_merge($conditions, $params);
		
		return $this->find($conditions);
	}
	
	public function findByIdAndUserId($contactId, $userId, $params = [])
	{
		$conditions = [
			'conditions' => 'id = ? AND user_id = ?',
			'bind' => [$contactId, $userId]
		];
		$conditions = array_merge($conditions, $params);
		
		return $this->findFirst($conditions);
	}

	public function displayName()
	{
		return $this->fname . ' ' . $this->lname;
	}

	public function displayAddress()
	{
		$address = '';

		if (!empty($this->address))
		{
			$address .= $this->address . '<br>';
		}

		if (!empty($this->address2))
		{
			$address .= $this->address2 . '<br>';
		}

		if (!empty($this->zip))
		{
			$address .= $this->zip . '<br>';
		}

		if (!empty($this->city))
		{
			$address .= $this->city . '<br>';
		}

		return $address;
	}
}