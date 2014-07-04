<?php

/**
 * This is the model class for table "color".
 *
 * The followings are the available columns in table 'color':
 * @property integer $c_id
 * @property string $c_nameth
 * @property string $c_nameen
 * @property string $c_createdate
 */
class Color extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'color';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('c_nameth, c_nameen, c_createdate', 'required'),
            array('c_nameth, c_nameen', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('c_id, c_nameth, c_nameen, c_createdate', 'safe', 'on' => 'search'),
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
            'c_id' => 'C',
            'c_nameth' => 'C Nameth',
            'c_nameen' => 'C Nameen',            
            'c_createdate' => 'C Createdate',
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

        $criteria->compare('c_id', $this->c_id);
        $criteria->compare('c_nameth', $this->c_nameth, true);
        $criteria->compare('c_nameen', $this->c_nameen, true);
        $criteria->compare('c_createdate', $this->c_createdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Color the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
