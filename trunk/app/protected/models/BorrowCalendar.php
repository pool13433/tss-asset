<?php

/**
 * This is the model class for table "borrow_calendar".
 *
 * The followings are the available columns in table 'borrow_calendar':
 * @property integer $cal_id
 * @property string $cal_name
 * @property string $cal_detail
 * @property string $cal_start
 * @property string $cal_finish
 * @property string $cal_createdate
 * @property integer $m_id
 */
class BorrowCalendar extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'borrow_calendar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cal_name, cal_detail, cal_start, cal_finish, cal_createdate, m_id,cal_color', 'required'),
            array('m_id', 'numerical', 'integerOnly' => true),
            array('cal_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('cal_id, cal_name, cal_detail, cal_start, cal_finish, cal_createdate, m_id', 'safe', 'on' => 'search'),
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
            'cal_id' => 'Cal',
            'cal_name' => 'Cal Name',
            'cal_detail' => 'Cal Detail',
            'cal_start' => 'Cal Start',
            'cal_finish' => 'Cal Finish',
            'cal_createdate' => 'Cal Createdate',
            'm_id' => 'M',
            'col_color' => 'Color',
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

        $criteria->compare('cal_id', $this->cal_id);
        $criteria->compare('cal_name', $this->cal_name, true);
        $criteria->compare('cal_detail', $this->cal_detail, true);
        $criteria->compare('cal_start', $this->cal_start, true);
        $criteria->compare('cal_finish', $this->cal_finish, true);
        $criteria->compare('cal_createdate', $this->cal_createdate, true);
        $criteria->compare('m_id', $this->m_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BorrowCalendar the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
