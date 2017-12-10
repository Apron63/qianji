<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%promo}}".
 *
 * @property int $id
 * @property date $begin_date
 * @property date $end_date
 * @property int $sum
 * @property int $city_id
 * @property string $name
 * @property int $active
 */
class Promo extends \yii\db\ActiveRecord
{
    public $statusList = ['Неактивен', 'Активен'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%promo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['begin_date', 'end_date', 'sum', 'city_id', 'name', 'active'], 'required'],
            [['sum', 'city_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['name', 'city_id'], 'unique', 'targetAttribute' => ['name', 'city_id']],
            ['name', 'match', 'pattern' => '/^[A-Za-z]/'],
            ['active', 'default', 'value' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ном',
            'begin_date' => 'Начало',
            'end_date' => 'Окончание',
            'sum' => 'Сумма',
            'city_id' => 'Зона',
            'name' => 'Название',
            'active' => 'Статус',
        ];
    }

    public function fields() {
        return [
            'begin_date',
            'end_date',
            'sum',
            'zone' => function($model) {return $model->cityName;},
            'active',
        ];
    }

    public function getCityId() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getCityName() {
        return $this->cityId ? $this->cityId->name : 'Не определено';
    }
}
