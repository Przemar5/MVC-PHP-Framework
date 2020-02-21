<?php


class Contacts extends Model
{
	public $deleted = 0;
	
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
	
	public function displayName()
	{
		return $this->fname . ' ' . $this->lname;
	}
}