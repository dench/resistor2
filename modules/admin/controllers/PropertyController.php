<?php

namespace app\modules\admin\controllers;

use app\models\Language;
use app\models\Object;
use app\models\PropertySearch;
use Yii;
use app\models\Property;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PropertyController implements the CRUD actions for Property model.
 */
class PropertyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Property models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropertySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAjaxProperty()
    {
        $model = new Property();

        $model->loadDefaultValues();

        $images = $model->images;
        
        return $this->renderAjax('create', [
            'model' => $model,
            'images' => $images,
        ]);
    }

    /**
     * Creates a new Property model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($object_id = null)
    {
        $model = new Property();

        $model->loadDefaultValues();

        if (!$model->id && $object_id)
        {
            $object = Object::find()->multilingual()->where(['id' => $object_id])->one();
            $model->setAttributes($object->attributes);
            foreach ($model->relations as $key => $relation) {
                $model->$key = $object->$key;
            }
            foreach (Language::suffixList() as $suffix => $name) {
                $model->{'name'.$suffix} = $object->{'name'.$suffix};
                $model->{'text'.$suffix} = $object->{'text'.$suffix};
            }

            $model->object_id = $object_id;

            $images = $object->images;
        } else {
            $images = $model->images;
        }

        if ($post = Yii::$app->request->post()) {

            $model->load($post);

            if ($model->object_id) {
                $object = Object::find()->multilingual()->where(['id' => $model->object_id])->one();
            } else {
                $object = new Object();
            }

            $image_ids = [];
            if (isset($post['Property']['image_ids'])) {
                foreach ($post['Property']['image_ids'] as $image_id) {
                    $image_ids[$image_id] = $image_id;
                }
            }
            foreach ($object->image_ids as $image_id) {
                $image_ids[$image_id] = $image_id;
            }
            $post['Property']['image_ids'] = $image_ids;

            $object->load($post, 'Property');

            if ($object->save()) {
                $model->object_id = $object->id;
            }

            if ($model->validate()) {
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'images' => $images,
        ]);
    }

    /**
     * Updates an existing Property model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModelMulti($id);

        if ($post = Yii::$app->request->post()) {

            $model->load($post);

            if ($model->object_id) {
                $object = Object::find()->multilingual()->where(['id' => $model->object_id])->one();
            } else {
                $object = new Object();
            }

            $image_ids = [];
            if (isset($post['Property']['image_ids'])) {
                foreach ($post['Property']['image_ids'] as $image_id) {
                    $image_ids[$image_id] = $image_id;
                }
            }
            foreach ($object->image_ids as $image_id) {
                $image_ids[$image_id] = $image_id;
            }
            $post['Property']['image_ids'] = $image_ids;

            $object->load($post, 'Property');

            if ($model->validate() && $object->validate()) {
                $model->save(false);
                $object->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'images' => $model->images,
        ]);
    }

    /**
     * Deletes an existing Property model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Property::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property|\yii\db\ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelMulti($id)
    {
        if (($model = Property::find()->where(['id' => $id])->multilingual()->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
