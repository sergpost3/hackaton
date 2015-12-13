<?php
namespace frontend\controllers;

use app\models\UsersEvents;
use Yii;
use yii\base\InvalidParamException;
use frontend\models\Events;
use frontend\models\Users;
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
        $list = Events::find()->orderBy('updated desc')->limit('8')->all();
        $users = array();
        foreach($list as $key=>$value)
            $users[$key] = Users::find()->where(['id' => $value["FK_organizer_id"]])->one();
        return $this->render('index', ['model' => $list, 'users' => $users]);
    }

    /**
     * Displays event view page.
     *
     * @return mixed
     */
    public function actionShow()
    {
        if (Yii::$app->request->get("eventname") == "")
            throw new CHttpException(404, 'The specified post cannot be found.');
        $eventname = Yii::$app->request->get("eventname");
        $list = Events::find()->where(['link' => $eventname]);
        if ($list->count() == 0)
            throw new CHttpException(404, 'The specified post cannot be found.');
        $list = $list->one();
        $org = Users::find()->where(['id' => $list["FK_organizer_id"]])->one();
        $participients = UsersEvents::find()->where(['FK_event_id' => $list->id]);
        $pars = array();
        if($participients->count()==0)
            $participients = false;
        if($participients) {
            $participients = $participients->all();
            foreach($participients as $value)
                $pars[] = $value["id"];
        }
        Users::current()->id;
        $participients = Users::find()->where(['id' => $pars])->all();
        return $this->render('view', ['model' => $list, 'org' => $org, 'participients' => $participients]);
    }

    /**
     * Displays add event page.
     *
     * @return mixed
     */
    public function actionAdd()
    {
        if ($post = Yii::$app->request->post()) {
            $trans = new Transliterate();
            $link = $trans->convert($post["name"]);
            $event = new Events();
            $event->name = $post["name"];
            $event->geo_x = "50.4853";//$post["geo_x"];
            $event->geo_y = "30.5154";//$post["geo_y"];
            $event->geo_zoom = "21";//$post["geo_zoom"];
            $event->geo_name = $post["geo_name"];
            $event->geo_google_maps_link = "https://www.google.com.ua/maps/search/kiev+geo+coo...";//$post["geo_google_maps_link"];
            $event->desc = $post["desc"];
            $event->datetime = $post["date"] . " " . $post["time"];
            $event->full_desc = $post["full_desc"];
            $event->people_count = 0;
            $event->max_people_count = $post["max_people_count"];
            $event->image = "asdcfvgh";//'';
            $event->type = $post["type"];
            $event->private = (Yii::$app->request->post("private") == "on") ? 1 : 0;
            $event->link = $link;
            $event->FK_organizer_id = "1";//'';
            $event->created = time();
            $event->updated = time();
            var_dump($event);
            $event->save(false);
            $this->redirect("/events/" . $link);
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
        // if !login goto events



        return $this->render('index');
    }

    /**
     * Displays edit event page.
     *
     * @return mixed
     */
    public function actionEdit()
    {
        if (Yii::$app->request->get("eventname") == "")
            throw new CHttpException(404, 'The specified post cannot be found.');
        $eventname = Yii::$app->request->get("eventname");
        $list = Events::find()->where(['link' => $eventname]);
        if ($list->count() == 0)
            throw new CHttpException(404, 'The specified post cannot be found.');

        if ($post = Yii::$app->request->post()) {
            $trans = new Transliterate();
            $link = $trans->convert($post["name"]);
            $event = Events::find()->where(['id' => Yii::$app->request->post("id")])->one();
            $event->name = $post["name"];
            $event->geo_x = "50.4853";//$post["geo_x"];
            $event->geo_y = "30.5154";//$post["geo_y"];
            $event->geo_zoom = "21";//$post["geo_zoom"];
            $event->geo_name = $post["geo_name"];
            $event->geo_google_maps_link = "https://www.google.com.ua/maps/search/kiev+geo+coo...";//$post["geo_google_maps_link"];
            $event->desc = $post["desc"];
            $event->datetime = $post["date"] . " " . $post["time"];
            $event->full_desc = $post["full_desc"];
            $event->people_count = 0;
            $event->max_people_count = $post["max_people_count"];
            $event->image = "asdcfvgh";//'';
            $event->type = $post["type"];
            $event->private = (Yii::$app->request->post("private") == "on") ? 1 : 0;
            $event->link = $link;
            $event->FK_organizer_id = "1";//'';
            $event->created = time();
            $event->updated = time();
            $event->save(false);
            $this->redirect("/events/" . $link);
        }

        return $this->render('edit', ['model' => $list->one()]);
    }
}
