<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $active
 * @property string $date_entered
 * @property string $date_updated
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property ThunderbirdClients[] $thunderbirdClients
 */
class Users extends CActiveRecord
{

    public $password_repeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, active, password, password_repeat', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'min'=>6, 'max'=>64, 'on'=>'register, recover'),
			array('password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"),
			array('password_repeat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, active, date_updated, date_created, date_entered', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'thunderbirdClients' => array(self::HAS_MANY, 'ThunderbirdClients', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'email' => 'email',
			'username' => 'Username',
			'password' => 'Password',
			'active' => 'Active',
			'date_updated' => 'Date Updated',
			'date_created' => 'Date Created',
            'date_entered' => 'Date Entered',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
        $criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('date_created',$this->date_created,true);
        $criteria->compare('date_entered',$this->date_entered,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    protected function afterValidate() {
        parent::afterValidate();
        if(!$this->hasErrors())
            $this->password = $this->hashPassword($this->password);
    }

    /*
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password) {
        return md5($password);
    }

    /*
     * Checks if the given password is correct.
     * @param string the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password) === $this->password;
    }
}
