<?php

namespace backend\controllers;

use backend\models\Water;
use backend\models\Wateradd;
use backend\models\WateraddSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WateraddController implements the CRUD actions for Wateradd model.
 */
class WateraddController extends Controller
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
     * Lists all Wateradd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WateraddSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wateradd model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Wateradd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($waterid)
    {
        date_default_timezone_set("Asia/Vientiane");

        if (Yii::$app->user->id !== null) {
            if (isset($_SESSION['factoryid'])) {
                if (isset($waterid)) {

                    $neddUnitWater = Water::find()->where(['id' => $waterid, 'factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
                    foreach ($neddUnitWater as $neddUnitWater1);

                    $model = new Wateradd();
                    if ($this->request->isPost) {
                        if ($model->load($this->request->post())) {
                            $model->date = date("Y-m-d");
                            $model->time = date('H:i:s');
                            $model->waterid = $waterid;
                            $model->unitid =  $neddUnitWater1['unitid'];
                            $model->factoryid = $_SESSION['factoryid'];
                            $model->userid = Yii::$app->user->id;

                            if ($model->save()) {

                                $oldqty = $neddUnitWater1['avalibledquantity'];
                                $newqty =  $model->quantity;
                                $totalqty = $oldqty + $newqty;

                                $factoryid =  $_SESSION['factoryid'];
                                $userid = Yii::$app->user->id;

                                $connection = Yii::$app->db;
                                // $update = $connection->createCommand('UPDATE water SET avalibledquantity=avalibledquantity+' . $qualityadd . ' WHERE   id=' . $waterid . ' and factoryid=' . $_SESSION['factoryid']. ' and userid='. Yii::$app->user->id);
                                // $update = $connection->createCommand('UPDATE water SET avalibledquantity=avalibledquantity+' . $qualityadd . ' WHERE   id=' . $waterid . ' and factoryid=' . $_SESSION['factoryid']. ' and userid='. Yii::$app->user->id);
                                // $update = $connection->createCommand("UPDATE water SET avalibledquantity=avalibledquantity+$qualityadd WHERE id=$waterid AND factoryid=$factoryid AND userid=$userid");
                                $update = $connection->createCommand()->update('water', ['avalibledquantity' => $totalqty], ['id' => $waterid, 'factoryid' => $factoryid, 'userid' => $userid])->execute();
                                if ($update) {
                                    echo Yii::$app->session->setFlash('success', Yii::t('app', 'Quantity has been added'));
                                    return $this->redirect(['/water']);
                                } else {
                                    echo "can not update water qty";
                                    die();
                                }
                            } else {
                                return $this->redirect(['index']);
                            }
                        }
                    } else {
                        $model->loadDefaultValues();
                    }
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                } else {
                    return $this->$this->goHome();
                }
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Wateradd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wateradd model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Wateradd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Wateradd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wateradd::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
