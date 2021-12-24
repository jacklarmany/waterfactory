<?php

namespace backend\controllers;

use backend\models\Customer;
use backend\models\CustomerSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                $searchModel = new CustomerSearch();
                $dataProvider = $searchModel->search($this->request->queryParams);

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
            return $this->goHome();
        }
        return $this->goHome();
    }

    /**
     * Displays a single Customer model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if ($id != null) {
                    return $this->render('view', [
                        'model' => $this->findModel($id),
                    ]);
                }
                return $this->goHome();
            }
            return $this->goHome();
        }
        return $this->goHome();
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {

                $model = new Customer();

                if ($this->request->isPost) {
                    if ($model->load($this->request->post())) {
                        $model->factoryid = $_SESSION['factoryid'];
                        $model->userid = Yii::$app->user->id;
                        if($model->save()){
                            echo Yii::$app->session->setFlash('success', Yii::t('app', 'New customer add completed'));
                            return $this->redirect(['index']);
                        }
                        else{
                            echo 0;
                        }
                    }
                } else {
                    $model->loadDefaultValues();
                }
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->goHome();
        }
        return $this->goHome();
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if ($id != null) {

                    $model = $this->findModel($id);

                    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
                return $this->goHome();
            }
            return $this->goHome();
        }
        return $this->goHome();
    }

    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if ($id != null) {
                    $this->findModel($id)->delete();

                    return $this->redirect(['index']);
                }
                return $this->goHome();
            }
            return $this->goHome();
        }
        return $this->goHome();
    }

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
