<?php

namespace frontend\models;

//use backend\models\AdminUser;
use Yii;
use yii\base\Model;
use common\models\Users;
use common\models\TenantUsers;

/**
 * Signup form
 */
class SignupForm extends TenantUsers {
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
                ],
                [['firstname', 'lastname', 'address', 'email', 'password', 'user_type_id'], 'required'],
            [['stateid', 'cityid', 'no_of_children', 'user_type_id'], 'integer'],
            [['dateofbirth', 'created', 'updated'], 'safe'],
            [['marital_status', 'gender'], 'string'],
            [['annual_income','mobileno'], 'number'],
            [['firstname', 'lastname', 'email', 'password'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    /*public function signup() {
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
    }*/

    public function signup() {
        if ($this->validate ()) {
            $user = new Users ();
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->email = $this->email;
            $user->user_type_id = $this->user_type_id;
            $user->stateid = $this->stateid;

            $user->cityid = $this->cityid;
            $user->dateofbirth = $this->dateofbirth;
            $user->marital_status = $this->marital_status;
            $user->gender = $this->gender;
            $user->annual_income = $this->annual_income;
            $user->no_of_children = $this->no_of_children;
            $user->mobileno = $this->mobileno;
            $user->address = $this->address;
            $user->password = $this->password;

            $user->setPassword ( $this->password );
            $user->generateAuthKey ();
            //echo "<pre>"; print_r($user);exit;
            if ($user->save (false)) {
                return $user;
            }
        }
        
        return null;
    }
}
