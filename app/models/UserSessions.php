<?php

namespace App\Models;
use Core\Model;
use Core\Session;
use Core\Cookie;


class UserSessions extends Model
{
	public $id, $user_id, $session, $user_agent;
	
	public function __construct()
	{
		$table = 'user_sessions';
		
		parent::__construct($table);
	}
	
	public static function getFromCookie()
	{
		$userSession = new self;
		
		if (Cookie::exists(REMEMBER_ME_COOKIE_NAME))
		{
			$userSession = $userSession->findFirst([
				'conditions' => 'user_agent = ? AND session = ?',
				'bind' => [
					Session::uagent_no_version(),
					Cookie::get(REMEMBER_ME_COOKIE_NAME)
				]
			]);
		}
		
		if (!$userSession)
		{
			return false;
		}
		
		return $userSession;
	}
	
//	public function delete()
//	{
//		$user_id = Session::get(CURRENT_USER_SESSION_NAME);
//		$user_agent = Session::uagent_no_version();
//		$sql = 'DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?';
//		
//		$this->_db->query($sql, [$user_id, $user_agent]);
//	}
}