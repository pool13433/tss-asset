<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $m_id
 * @property string $m_fname
 * @property string $m_lname
 * @property string $m_username
 * @property string $m_password
 * @property string $m_birthday
 * @property string $m_pid
 * @property string $m_tel
 * @property string $m_email
 * @property string $m_career
 * @property string $m_address
 * @property string $m_createdate
 * @property string $m_img
 * @property integer $s_id
 */
class Member extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'member';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('m_fname, m_lname, m_username, m_password, m_birthday, m_pid, m_tel, m_email, m_address, m_createdate, s_id', 'required'),
            array('s_id', 'numerical', 'integerOnly' => true),
            array('m_fname, m_lname, m_career', 'length', 'max' => 100),
            array('m_username, m_password', 'length', 'max' => 50),
            array('m_pid', 'length', 'max' => 17),
            array('m_tel', 'length', 'max' => 15),
            array('m_email', 'length', 'max' => 20),
            array('m_img', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('m_id, m_fname, m_lname, m_username, m_password, m_birthday, m_pid, m_tel, m_email, m_career, m_address, m_createdate, m_img, s_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'm_id' => 'M',
            'm_fname' => 'M Fname',
            'm_lname' => 'M Lname',
            'm_username' => 'M Username',
            'm_password' => 'M Password',
            'm_birthday' => 'M Birthday',
            'm_pid' => 'M Pid',
            'm_tel' => 'M Tel',
            'm_email' => 'M Email',
            'm_career' => 'M Career',
            'm_address' => 'M Address',
            'm_createdate' => 'M Createdate',
            'm_img' => 'M Img',
            's_id' => 'S',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('m_id', $this->m_id);
        $criteria->compare('m_fname', $this->m_fname, true);
        $criteria->compare('m_lname', $this->m_lname, true);
        $criteria->compare('m_username', $this->m_username, true);
        $criteria->compare('m_password', $this->m_password, true);
        $criteria->compare('m_birthday', $this->m_birthday, true);
        $criteria->compare('m_pid', $this->m_pid, true);
        $criteria->compare('m_tel', $this->m_tel, true);
        $criteria->compare('m_email', $this->m_email, true);
        $criteria->compare('m_career', $this->m_career, true);
        $criteria->compare('m_address', $this->m_address, true);
        $criteria->compare('m_createdate', $this->m_createdate, true);
        $criteria->compare('m_img', $this->m_img, true);
        $criteria->compare('s_id', $this->s_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Member the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
