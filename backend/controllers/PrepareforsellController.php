<?php

namespace backend\controllers;

use backend\models\Prepareforsell;
use backend\models\PrepareforsellSearch;
use backend\models\Water;
use mysqli_result;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\BaseUrl;

/**
 * PrepareforsellController implements the CRUD actions for Prepareforsell model.
 */
class PrepareforsellController extends Controller
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
     * Lists all Prepareforsell models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrepareforsellSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prepareforsell model.
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
     * Creates a new Prepareforsell model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($waterid)
    {
        $waterid = $_REQUEST['waterid'];
        if (Yii::$app->user->id != null) {
            if (isset($_SESSION['factoryid'])) {
                if ($waterid != null) {

                    $model = new Prepareforsell();
                    $checkDataP = Prepareforsell::find()->where(['waterid' => $waterid, 'factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
                    if (count($checkDataP) <= 0) {

                        $waterData = Water::find()->where(['id' => $waterid, 'factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
                        if (count($waterData) >= 1) {
                            if ($this->request->isPost) {
                                if ($model->load($this->request->post())) {

                                    foreach ($waterData as $waterData1);

                                    if ($waterData1['quality'] < $model->quality) {
                                        echo Yii::$app->session->setFlash('error', 'The Quantity is not enough');
                                    } else {

                                        $model->sellprice = $waterData1['sellprice'];
                                        $model->waterid = $waterid;
                                        $model->factoryid = $_SESSION['factoryid'];
                                        $model->userid = Yii::$app->user->id;
                                        if ($model->save()) {
                                            echo Yii::$app->session->setFlash('success', Yii::t('app', 'Added in the preparation for sell'));
                                            return $this->render('create', ['model' => $model, 'waterid' => $waterid]);
                                            // return $this->redirect(Yii::$app->request->BaseUrl . '/index.php?r=water');
                                        }
                                    }
                                }
                            } else {
                                $model->loadDefaultValues();
                            }
                            return $this->render('create', [
                                'model' => $model,
                                'waterid' => $waterid,
                            ]);
                        } else {
                            echo Yii::$app->session->setFlash('error', Yii::t('app', 'Select the product for sell first'));
                            return $this->redirect(Yii::$app->request->BaseUrl . '/index.php?r=water');
                        }
                    } else {
                        foreach ($checkDataP as $checkDataP1);
                        if ($waterid == $checkDataP1['waterid']) {
                            echo Yii::$app->session->setFlash('error', Yii::t('app', 'This item alreay exist, Please select new item for sell'));
                            return $this->redirect(Yii::$app->request->BaseUrl . '/index.php?r=water');
                        }
                    }
                } else {
                    echo "dd";
                    die();
                    return $this->redirect('water');
                }
            } else {
                return $this->goHome();
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Prepareforsell model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'water' => $model->waterid,
        ]);
    }

    /**
     * Deletes an existing Prepareforsell model.
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
     * Finds the Prepareforsell model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Prepareforsell the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prepareforsell::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }



    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////

    public function actionCalculate($id)
    {
        echo $id + 100;
    }

    public function actionPrintbill()
    {
        if (Yii::$app->user->id !== null && isset($_SESSION['factoryid'])) {

            $PrepareData = Prepareforsell::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
            // if(is_array($PrepareData)){
            //     echo "is array";
            // }
            // else{
            //     echo "not array";
            // }
            // die();

            // if(count($PrepareData)>1){
            //     foreach($PrepareData as $newData){
            //         echo $newData['waterid']." || ";
            //         echo $newData['quality']." || ";
            //         echo $newData['sellprice']." || ";
            //         echo $newData['sellprice']*$newData['quality'];
            //         echo $newData['discount']." || <br>";

            //     }
            // }

            $command = Yii::$app->db->createCommand('SELECT * FROM prepareforsellview WHERE factoryid=' . $_SESSION['factoryid'] . ' and userid=' . Yii::$app->user->id);
            $result = $command->query();

            // if(is_object($result)){
            //     echo "is object";
            // }
            // else{
            //     echo "not object";
            // }
            // die();
            $t = time();
            $date = "2021-12-30";
            $billno = Yii::$app->user->id . "" . $_SESSION['factoryid'] . "-".$t;
            $userid = Yii::$app->user->id;
            $factoryid = $_SESSION['factoryid'];


            foreach ($result as $commands) {
                $waterid = $commands['waterid'];
                $quantity = $commands['quality'];
                $sellprice = $commands['sellprice'];
                $amount = $quantity * $sellprice;
                $discount = $commands['discount'];
                $amountdisc = $commands['amountdiscount'];
                $customer = $commands['customerid'];

                ///INSERT DATA OBJECT TO MYSQL
                $command = Yii::$app->db;
                $sql = $command->createCommand("INSERT INTO bill(billno,date,waterid,quantity,sellprice,amount,factoryid,userid)VALUES('$billno','$date','$waterid','$quantity','$sellprice','$amount','$factoryid','$userid')");
                $sql->query();

                if($sql->query()){
                $this->findModel(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->delete();
                echo "print bill completed";
                
                }
            }
        }
    }
}
