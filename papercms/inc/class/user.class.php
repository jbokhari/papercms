<?php
class user{
	private $users;
	private $paper;
	public function __construct($id = null){
		global $paper;
		// echo get_class($paper);
		if (isset($paper) && is_object($paper) && get_class($paper) == "paperCMS"){
			$this->paper = $paper;
		} else {
			if ( defined("CMS_HOME") ){
				if (file_exists(CMS_HOME . "/papercms/inc/class/paperCMS.class.php"))
					require_once(CMS_HOME . "/papercms/inc/class/paperCMS.class.php");
			}
			$this->paper = new paperCMS();
		}
		$users = simplexml_load_file(CMS_HOME . "/papercms/data/users/users.xml");
		foreach($users->children() as $user){
			// print_x($user);
			if ($id !== null){

				if ( isset( $user->id ) && $users->id == $id ){
					$thisUser = $user;
					$this->setParams($thisUser);
					break;
				} else {
					$this->id = false;
					$this->name = false;
					$this->password = false;
					$this->status = false;
				}
			} else {
				$this->users = $users;
			}
		}
	}
	static function userExistsById($id){


	}
	public function setParams($user){
		$this->id = $user->id;
		$this->name = $user->name;
		$this->password = $user->password;
		$this->status = $user->status;

	}

	public function getUserBy($check, $value = "id"){
		print_x($this->users->user);
		print_x($this->users->user);
		if( isset( $this->users->user ) ){
			foreach ( $this->users as $user ){
				$check = trim(strval($check));
				$thisValue = trim(strval($user->$value));
				if ($thisValue === $check){
					return $user;
				}
			}
		}
	}
	public function check_password($password, $username){
		// echo $this->paper->settings->passwordSalt;
		// echo "<br />";

		// print_x($this);
		$user = $this->getUserBy($username, "login");
		if ($user) {
		//user does exist
			$password = md5($password . $this->paper->settings->passwordSalt);
			// echo $password;
			// print_x($this);
			$db = strval( $user->password );
			if ($db === $password){
				echo "Correct Password!";
				return true;
			}
		}
		return false;
	}
}