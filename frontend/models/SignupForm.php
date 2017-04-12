<?php

namespace frontend\models;

//use backend\models\AdminUser;
use Yii;
use yii\base\Model;
use common\models\Users;

/**
 * Signup form
 */
class SignupForm extends Model {
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $user_type_id;
    
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
                        'lastname',
                        'filter',
                        'filter' => 'trim' 
                ],
                [ 
                        'firstname',
                        'required' 
                ],
                [ 
                        'lastname',
                        'required' 
                ],
                [ 
                        'user_type_id',
                        'required' 
                ],
                [ 
                        'email',
                        'unique',
                        'targetClass' => '\common\models\User',
                        'message' => 'This email has already been taken.' 
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
            $user->lastname = $this->lastname;
            $user->email = $this->email;
            $user->user_type_id = $this->user_type_id;
            $user->setPassword ( $this->password );
            $user->generateAuthKey ();
            if ($user->save (false)) {
                return $user;
            }
        }
        
        return null;
    }
}
