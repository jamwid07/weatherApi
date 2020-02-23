<?php
/**
 * @author : Jamshid NA
 * @email  : <jamwid07@mail.ru>
 * @created: 23-Feb-20
 */


namespace app\modules\weather\services;


use app\modules\weather\models\Weather;

class WeatherService
{
    public static function createOrUpdate(array $json)
    {
        $city_id = $json['id'];
        $weather = Weather::findOne(['city_id' => $city_id]);
        if ($weather === null) {
            $weather = new Weather();
        }
        $weather->city = $json['name'];
        $weather->city_id = $json['id'];
        $weather->temperature = $json['main']['temp'];
        $weather->feels = $json['main']['feels_like'];
        $weather->humidity = $json['main']['humidity'];
        if ($weather->validate()) {
            $weather->save();
            return $weather;
        }
        return $weather->getErrors();
    }
}
