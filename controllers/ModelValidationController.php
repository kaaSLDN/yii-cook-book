<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 13.03.18
 * Time: 14:23
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Article;
use yii\helpers\Html;



class ModelValidationController extends Controller //(вызываем с помощью model-validation/succes
{
    private function getLongTitle()
    {
        return 'There is a very long content for current article, '.'it should be
less then ten words';
    }

    private function getShortTitle()
    {
        return 'There is a shot title';
    }

    private function renderContentByModel($title)
    {
        $model = new Article();
        $model->title = $title;
        if ($model->validate()) {
            $content = Html::tag('div', 'Model is valid.',[
                'class' => 'alert alert-success',
            ]);
        } else {
            $content = Html::errorSummary($model, [
                'class' => 'alert alert-danger',
            ]);
        }
        return $this->renderContent($content);
    }
    public function actionSuccess()
    {
        $title = $this->getShortTitle();
        return $this->renderContentByModel($title);
    }
    public function actionFailure()
    {
        $title = $this->getLongTitle();
        return $this->renderContentByModel($title);
    }
}