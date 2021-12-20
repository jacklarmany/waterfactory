<?php

namespace backend\controllers;

use backend\models\Factory;
use backend\models\FactorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FactoryController implements the CRUD actions for Factory model.
 */
class FactoryController extends Controller
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
     * Lists all Factory models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        if (isset($id)) {
            $searchModel = new FactorySearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'id' => $id,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single Factory model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->id != null) {
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
    }

    /**
     * Creates a new Factory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->id != null) {
            $model = new Factory();
            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {

                 //DO THIS IF SELECTED LOGO
                 $image = UploadedFile::getInstance($model, 'logo');
                 $imageName = "LGF-" . rand(000, 999) . time() . '.' . $image->getExtension();
                 $image->saveAs(\Yii::getAlias('@webroot') . '/logo/' . $imageName);  // here we need to give path where to upload this function work same as move_upload_file in php
                 $model->logo = $imageName;

                    $model->userid = Yii::$app->user->id;
                    $model->save();
                    return $this->goHome();
                    // return $this->redirect(['index', 'id' => $model->id]);
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
    }

    /**
     * Updates an existing Factory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->id != null) {
            if (isset($id)) {
                // $model = $this->findModel($id);
                $model = Factory::find()->multilingual()->where(['id' => $id])->one();

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
    }

    /**
     * Deletes an existing Factory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->id != null) {
            $this->findModel($id)->delete();
            return $this->goHome();
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the Factory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Factory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
