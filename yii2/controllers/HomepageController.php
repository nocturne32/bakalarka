<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\web\Controller;

class HomepageController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if ($user_id = Yii::$app->request->get('author')) {
            $articles = Article::find()->orderBy('id DESC')->where(['user_id' => $user_id])->all();
        } elseif ($category_id = Yii::$app->request->get('category')) {
            $articles = Article::find()->orderBy('id DESC')->where(['category_id' => $category_id])->all();
        } else {
            $articles = Article::find()->orderBy('id DESC')->all();
        }

        return $this->render('index', [
            'articles' => $articles,
        ]);
    }


}
