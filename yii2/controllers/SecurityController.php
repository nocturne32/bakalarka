<?php

namespace app\controllers;

use app\models\Authenticator;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SecurityController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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

        $authenticator = new Authenticator();
        if ($authenticator->load(Yii::$app->request->post()) && $authenticator->login()) {
            return $this->goHome();
        }

        $authenticator->password = '';
        return $this->render('login', [
            'authenticator' => $authenticator,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = new User();
        if ($user->load(Yii::$app->request->post())) {
            $user->fullname = $user->fullname === '' ? null : $user->fullname;
            $user->email = $user->email === '' ? null : $user->email;
            $user->roles = 'ROLE_USER';
            $user->registered_at = (new \DateTimeImmutable('now'))->format('Y-m-d H:i:s');
            if ($user->save()) {
                return $this->goHome();
            }
        }

        return $this->render('register', [
            'model' => $user,
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

}
