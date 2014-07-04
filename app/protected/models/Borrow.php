<?php

/**
 * This is the model class for table "borrow".
 *
 * The followings are the available columns in table 'borrow':
 * @property integer $b_id
 * @property integer $m_id
 * @property string $b_startdate
 * @property string $b_stopdate
 * @property string $b_createdate
 * @property integer $b_status
 */
class Borrow extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'borrow';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('m_id, b_code,b_startdate, b_stopdate, b_createdate, b_status', 'required'),
            array('m_id, b_status', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('b_id, m_id, b_startdate, b_stopdate, b_createdate, b_status', 'safe', 'on' => 'search'),
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
            'b_id' => 'B',
            'b_code' => 'รหัส',
            'm_id' => 'M',
            'b_startdate' => 'B Startdate',
            'b_stopdate' => 'B Stopdate',
            'b_createdate' => 'B Createdate',
            'b_status' => 'B Status',
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

        $criteria->compare('b_id', $this->b_id);
        $criteria->compare('m_id', $this->m_id);
        $criteria->compare('b_startdate', $this->b_startdate, true);
        $criteria->compare('b_stopdate', $this->b_stopdate, true);
        $criteria->compare('b_createdate', $this->b_createdate, true);
        $criteria->compare('b_status', $this->b_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Borrow the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
