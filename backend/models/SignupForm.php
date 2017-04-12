<?php

namespace backend\models;

//use backend\models\AdminUser;
use Yii;
use yii\base\Model;
use common\models\Users;

/**
 * Signup form
 */
class SignupForm extends Model {
	public $firstname;
	public $email;
	public $password;
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						'firstname',
						'filter',
						'filter' => 'trim' 
				],
				[ 
						'firstname',
						'required' 
				],
				[ 
						'firstname',
						'unique',
						'targetClass' => '\common\models\User',
						'message' => 'This firstname has already been taken.' 
				],
				[ 
						'firstname',
						'string',
						'min' => 2,
						'max' => 255 
				],
				
				[ 
						'email',
						'filter',
						'filter' => 'trim' 
				],
				[ 
						'email',
						'required' 
				],
				[ 
						'email',
						'email' 
				],
				[ 
						'email',
						'string',
						'max' => 255 
				],
				[ 
						'email',
						'unique',
						'targetClass' => '\common\models\User',
						'message' => 'This email address has already been taken.' 
				],
				
				[ 
						'password',
						'required' 
				],
				[ 
						'password',
						'string',
						'min' => 6 
				] 
		];
	}
	
	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup() {
		if ($this->validate ()) {
			$user = new Users ();
			$user->firstname = $this->firstname;
			$user->email = $this->email;
			$user->setPassword ( $this->password );
			$user->generateAuthKey ();
			if ($user->save (false)) {
				return $user;
			}
			else
			{
				echo "<pre>";
				print_r($user);
				exit;
			}
		}
		
		return null;
	}
}
