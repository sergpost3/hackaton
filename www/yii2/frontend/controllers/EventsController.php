<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Events controller
 */
class EventsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
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
     * Displays events page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays event view page.
     *
     * @return mixed
     */
    public function actionView()
    {
        return $this->render('index');
    }

    /**
     * Displays add event page.
     *
     * @return mixed
     */
    public function actionAdd()
    {
        return $this->render('index');
    }

    /**
     * Displays moderate event page.
     *
     * @return mixed
     */
    public function actionModerate()
    {
        return $this->render('index');
    }

    /**
     * Displays personal event page.
     *
     * @return mixed
     */
    public function actionPersonal()
    {
        return $this->render('index');
    }

    /**
     * Displays edit event page.
     *
     * @return mixed
     */
    public function actionEdit()
    {
        return $this->render('index');
    }
}
