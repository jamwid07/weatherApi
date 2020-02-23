<?php
/**
 * @author : Jamshid NA
 * @email  : <jamwid07@mail.ru>
 * @created: 23-Feb-20
 */


namespace app\modules\weather\controllers;


use app\modules\weather\services\WeatherService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Json;

class ApiController extends Controller
{
    public function actionGet(): int
    {
        echo "connect to weather API\n";
        $client = new Client();
        try {
            $request = $client->request(
                'GET',
                'https://api.openweathermap.org/data/2.5/weather',
                ['query' => [
                    'id' => 2643743,
                    'units' => 'metric',
                    'appid' => \Yii::$app->params['weatherApiToken']
                ]]
            );
        } catch (RequestException $e) {
            echo 'errorNo: ' . $e->getCode() . '; ' . $e->getMessage();
            return ExitCode::DATAERR;
        }
        $json = Json::decode($request->getBody()->getContents());
        echo "saving results\n";
        $weather = WeatherService::createOrUpdate($json);
        if (is_array($weather)) {
            sprintf($weather);
            return ExitCode::CANTCREAT;
        }
        echo "weather updated!\n";
        return ExitCode::OK;
    }
}
