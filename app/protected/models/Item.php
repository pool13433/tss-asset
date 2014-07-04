<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $i_id
 * @property integer $it_id
 * @property string $g_id
 * @property string $i_code
 * @property string $i_nameth
 * @property string $i_nameen
 * @property string $i_detail
 * @property integer $c_id
 * @property integer $s_id
 * @property string $i_createdate
 * @property integer $i_status
 * @property string $i_img
 * @property integer $i_num
 */
class Item extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('it_id,  i_code, i_nameth, i_nameen, i_detail, c_id, s_id, i_createdate, i_status, i_img, i_num', 'required'),
            array('it_id, c_id, s_id, i_status, i_num', 'numerical', 'integerOnly' => true),
            array('g_id, i_nameth, i_nameen, i_img', 'length', 'max' => 255),
            array('i_code', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('i_id, it_id, g_id, i_code, i_nameth, i_nameen, i_detail, c_id, s_id, i_createdate, i_status, i_img, i_num', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'Group', 'g_id'),
            'item_type' => array(self::BELONGS_TO, 'ItemType', 'it_id'),
            'color' => array(self::BELONGS_TO, 'Color', 'c_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'i_id' => 'I',
            'it_id' => 'It',
            'g_id' => 'G',
            'i_code' => 'I Code',
            'i_nameth' => 'I Nameth',
            'i_nameen' => 'I Nameen',
            'i_detail' => 'I Detail',
            'c_id' => 'C',
            's_id' => 'S',
            'i_createdate' => 'I Createdate',
            'i_status' => 'I Status',
            'i_img' => 'I Img',
            'i_num' => 'I Num',
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

        $criteria->compare('i_id', $this->i_id);
        $criteria->compare('it_id', $this->it_id);
        $criteria->compare('g_id', $this->g_id, true);
        $criteria->compare('i_code', $this->i_code, true);
        $criteria->compare('i_nameth', $this->i_nameth, true);
        $criteria->compare('i_nameen', $this->i_nameen, true);
        $criteria->compare('i_detail', $this->i_detail, true);
        $criteria->compare('c_id', $this->c_id);
        $criteria->compare('s_id', $this->s_id);
        $criteria->compare('i_createdate', $this->i_createdate, true);
        $criteria->compare('i_status', $this->i_status);
        $criteria->compare('i_img', $this->i_img, true);
        $criteria->compare('i_num', $this->i_num);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Item the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
