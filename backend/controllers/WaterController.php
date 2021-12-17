<?php

namespace backend\controllers;
use backend\models\Water;
use backend\models\WaterSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WaterController implements the CRUD actions for Water model.
 */
class WaterController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Water models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                $searchModel = new WaterSearch();
                $dataProvider = $searchModel->search($this->request->queryParams);
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single Water model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if (isset($id)) {
                    return $this->render('view', [
                        'model' => $this->findModel($id),
                    ]);
                } else {
                    return $this->goHome();
                }
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new Water model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {

                $model = new Water();
                if ($this->request->isPost) {
                    if ($model->load($this->request->post())) {
                        $model->userid = Yii::$app->user->id;
                        $a = 1+1;
                        $model->image = $model->image ."" .$a ."85620125.jpg";
                        $model->factoryid = $_SESSION['factoryid'];

                        if($model->save()){
                            echo Yii::$app->session->setFlash('success', Yii::t('app', 'Create Successfully'));
                            return $this->render('index');
                        }
                        else{
                            echo "fail";
                            die();
                        }
                    }
                } else {
                    $model->loadDefaultValues();
                }
                return $this->render('create', [
                    'model' => $model,
                ]);
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Water model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if (isset($id)) {
                    $model = $this->findModel($id);

                    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                    return $this->render('update', [
                        'model' => $model,
                    ]);
                } else {
                    return $this->goHome();
                }
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing Water model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if (isset($id)) {
                    $this->findModel($id)->delete();
                    return $this->redirect(['index']);
                } else {
                    return $this->goHome();
                }
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the Water model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Water the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Water::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
