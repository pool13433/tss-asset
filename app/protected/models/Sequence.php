<?php

/**
 * This is the model class for table "sequence".
 *
 * The followings are the available columns in table 'sequence':
 * @property integer $s_id
 * @property string $s_table
 * @property integer $s_value
 * @property string $s_updatedate
 */
class Sequence extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sequence';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('s_table, s_value, s_updatedate', 'required'),
            array('s_value', 'numerical', 'integerOnly' => true),
            array('s_table', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('s_id, s_table, s_value, s_updatedate', 'safe', 'on' => 'search'),
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
            's_id' => 'S',
            's_table' => 'S Table',
            's_value' => 'S Value',
            's_updatedate' => 'S Updatedate',
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
        $criteria->compare('s_table', $this->s_table, true);
        $criteria->compare('s_value', $this->s_value);
        $criteria->compare('s_updatedate', $this->s_updatedate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sequence the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
