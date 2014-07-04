<?php

/**
 * This is the model class for table "item_type".
 *
 * The followings are the available columns in table 'item_type':
 * @property integer $it_id
 * @property string $it_name
 * @property integer $id_id
 * @property string $it_createdate
 */
class ItemType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'item_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('it_name, id_id, it_createdate', 'required'),
            array('id_id', 'numerical', 'integerOnly' => true),
            array('it_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('it_id, it_name, id_id, it_createdate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'item_department' => array(self::BELONGS_TO, 'ItemDepartment', 'id_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'it_id' => 'It',
            'it_name' => 'It Name',
            'id_id' => 'ID',
            'it_createdate' => 'It Createdate',
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

        $criteria->compare('it_id', $this->it_id);
        $criteria->compare('it_name', $this->it_name, true);
        $criteria->compare('id_id', $this->id_id);
        $criteria->compare('it_createdate', $this->it_createdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ItemType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
