<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use frontend\models\Services;
use frontend\models\Users;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Cabinet controller
 */
class ServicesController extends Controller
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
     * Displays index service page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $list = Services::find()->orderBy('updated desc')->limit('6')->all();
        $users = array();
        foreach($list as $key=>$value)
            $users[$key] = Users::find()->where(['id' => $value["FK_user_id"]])->one();
        return $this->render('index', ['model' => $list, 'users' => $users]);
    }

    /**
     * Displays edit service page.
     *
     * @return mixed
     */
    public function actionEdit()
    {
        return $this->render('index');
    }

    /**
     * Displays view service page.
     *
     * @return mixed
     */
    public function actionShow()
    {
        if (Yii::$app->request->get("servicename") == "")
            throw new CHttpException(404, 'The specified post cannot be found.');
        $servicename = Yii::$app->request->get("servicename");
        $list = Services::find()->where(['link' => $servicename]);
        if ($list->count() == 0)
            throw new CHttpException(404, 'The specified post cannot be found.');
        $list = $list->one();
        $org = Users::find()->where(['id' => $list["FK_user_id"]])->one();
        /*$participients = UsersEvents::find()->where(['FK_event_id' => $list->id]);
        $pars = array();
        if($participients->count()==0)
            $participients = false;
        if($participients) {
            $participients = $participients->all();
            foreach($participients as $value)
                $pars[] = $value["id"];
        }
        $participients = Users::find()->where(['id' => $pars])->all();*/
        return $this->render('view', ['model' => $list, 'org' => $org]);
    }

    /**
     * Displays add service page.
     *
     * @return mixed
     */
    public function actionAdd()
    {
        return $this->render('index');
    }
}
