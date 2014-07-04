<?php

/**
 * This is the model class for table "size".
 *
 * The followings are the available columns in table 'size':
 * @property integer $s_id
 * @property string $s_name
 * @property integer $st_id
 * @property string $s_createdate
 */
class Size extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'size';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('s_name, st_id, s_createdate', 'required'),
            array('st_id', 'numerical', 'integerOnly' => true),
            array('s_name', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('s_id, s_name, st_id, s_createdate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'size_type' => array(self::BELONGS_TO, 'SizeType', 'st_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            's_id' => 'S',
            's_name' => 'S Name',
            'st_id' => 'St',
            's_createdate' => 'S Createdate',
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

        $criteria->compare('s_id', $this->s_id);
        $criteria->compare('s_name', $this->s_name, true);
        $criteria->compare('st_id', $this->st_id);
        $criteria->compare('s_createdate', $this->s_createdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Size the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
