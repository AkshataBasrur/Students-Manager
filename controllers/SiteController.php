<?php
namespace app\controllers;
error_reporting(E_ALL);
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Studinfo;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $studinfo = Studinfo::find()->all();
        return $this->render('index', ['studinfo'=> $studinfo]);
    }
    public function actionArecord()
    {
        $users='Active';
        $studinfo = Studinfo::find()->where("status = 1")->all();
       // print_r($studinfo);
        return $this->render('arecord', ['studinfo'=> $studinfo]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
       $studinfo = new Studinfo();
       $formData= Yii::$app ->request->post();
       if($studinfo->load($formData))
       {
        //print_r($studinfo);die;
        $imageName = $studinfo->fname;
        //get instance of uploaded file
        $studinfo->picture = UploadedFile::getInstance($studinfo, 'picture');
        $studinfo->picture->saveAs( 'uploads/'.$imageName.'.'.$studinfo->picture->extension );
        $studinfo->picture = 'uploads/'.$imageName.'.'.$studinfo->picture->extension;

        $list= Yii::$app->db->createCommand('select count(*) as count from studinfo')->queryAll();
        $studinfo->id= $list[0]['count'];
        if($studinfo->save())
        {
            Yii::$app->getSession()->setFlash('message','Registration successful');
            return $this->redirect(['index']);
        }
        else{
            //var_dump("in2");die;
            Yii::$app->getSession()->setFlash('message','Registration failed');
       }
        //var_dump("in4");die;
       }
       return $this->render('create', ['studinfo'=> $studinfo]);
    }

    public function actionView($id)
    {
        $studinfo = Studinfo::findOne($id);
        return $this->render('view',['studinfo'=>$studinfo]);
    }
    public function actionDelete($id)
    {
        $studinfo = Studinfo::findOne($id)->delete();
        if($studinfo)
        {
            Yii::$app->getSession()->setFlash('message','Record deleted successful');
            return $this->redirect(['index']);
        }
    }
    public function actionUpdate($id)
    {
        $studinfo = Studinfo::findOne($id);
        if($studinfo->load(Yii::$app->request->post()) && $studinfo->save())
        {
            Yii::$app->getSession()->setFlash('message','Record updated successful');
            return $this->redirect(['index', 'id'=> $studinfo->id]);
        }
        else{
            return $this->render('update',['studinfo'=>$studinfo]);
        }
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
