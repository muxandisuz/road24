<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionMail()
    {
        $result = Yii::$app->mailer->compose()
            ->setFrom('muxandisuz@gmail.com')
            ->setTo('muhammadziyo2105@gmail.com')
            ->setSubject('Road24 SMTP test')
            ->setTextBody('SMTP ishlayapti!')
            ->send();

        return [
            'success' => $result,
            'message' => $result
                ? 'Email yuborildi'
                : 'Email yuborilmadi',
        ];
    }
}
