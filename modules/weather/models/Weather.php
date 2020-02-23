<?php

namespace app\modules\weather\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "weather".
 *
 * @property int        $id
 * @property string     $city
 * @property int        $city_id
 * @property float|null $temperature
 * @property float|null $feels
 * @property int|null   $humidity
 * @property int|null   $created_at
 * @property int|null   $updated_at
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'weather';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['temperature', 'feels'], 'number'],
            [['city_id', 'humidity', 'created_at', 'updated_at'], 'integer'],
            [['city'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'city_id' => 'City Id',
            'temperature' => 'Temperature',
            'feels' => 'Feels',
            'humidity' => 'Humidity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
