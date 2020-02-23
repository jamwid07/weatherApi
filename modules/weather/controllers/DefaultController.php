<?php

namespace app\modules\weather\controllers;

use app\modules\weather\models\Weather;
use yii\web\Controller;

/**
 * Default controller for the `weather` module
 */
class DefaultController extends Controller
{
    public $layout = 'main.twig';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(): string
    {
        $weather = Weather::findOne(['city_id' => 2643743]);
        return $this->render('index.twig', ['weather' => $weather]);
    }
}
