<?php

namespace app\controllers;

use app\models\Request;
use app\models\Page;
use app\models\Property;
use app\models\PropertySearch;
use Yii;
use app\models\form\ContactForm;
use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Page::viewPage('index');

        $searchModel = new PropertySearch();
        $lastItems = Property::lastItems();
        $weekItems = Property::weekItems();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'last' => $lastItems,
            'week' => $weekItems
        ]);
    }

    public function actionContacts()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contacts', [
            'model' => $model,
        ]);
    }

    /**
     * Displays send page.
     *
     * @return mixed
     */
    public function actionSend()
    {
        $model = new Request();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting us.'));
            return $this->redirect(['contacts']);
        } else {
            return $this->renderAjax('modalSend', [
                'model' => $model,
            ]);
        }
    }
}
