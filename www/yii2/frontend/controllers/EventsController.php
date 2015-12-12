<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use frontend\models\Events;
use frontend\models\Transliterate;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\ContactForm;

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
    public function actionShow()
    {
        return $this->render('show');
    }

    /**
     * Displays add event page.
     *
     * @return mixed
     */
    public function actionAdd()
    {
        if($post = Yii::$app->request->post()) {
            $trans = new Transliterate();
            $event = new Events();
            $event->name = $post["name"];
            $event->geo_x = "50.4853";//$post["geo_x"];
            $event->geo_y = "30.5154";//$post["geo_y"];
            $event->geo_zoom = "21";//$post["geo_zoom"];
            $event->geo_name = $post["geo_name"];
            $event->geo_google_maps_link = "https://www.google.com.ua/maps/search/kiev+geo+coo...";//$post["geo_google_maps_link"];
            $event->desc = $post["desc"];
            $event->datetime = "2015-12-13 16:00:00";//$post["datetime"];
            $event->full_desc = $post["full_desc"];
            $event->people_count = 0;
            $event->max_people_count = $post["max_people_count"];
            $event->image = "asdcfvgh";//'';
            $event->type = $post["type"];
            $event->private = (Yii::$app->request->post("private")=="on") ? 1 : 0;
            $event->link = $trans->convert($post["name"]);
            $event->FK_organizer_id = "1";//'';
            $event->created = time();
            $event->updated = time();
            var_dump($event);
            $event->save(false);
        }

        return $this->render('add');
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
