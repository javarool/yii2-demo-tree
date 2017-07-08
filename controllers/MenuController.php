<?php

namespace app\controllers;

use app\models\MenuItemModel;

class MenuController extends \yii\web\Controller {

    public function actionIndex() {
        $items = $this->loadMenu();
        $tree = new \app\models\EditableTreeModel();
        $tree->assembleFromItems($items);

        return $this->render('index', [
                    'model' => $items,
                    'tree' => $tree,
        ]);
    }

    public function actionCreate($path) {
        $model = new MenuItemModel();
        $model->parents_id = $path;
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
            }
        }
        return $this->render('edit', [
                    'model' => $model,
                    'action' => 'create'
        ]);
    }
    
    public function actionSave() {
        $model = new MenuItemModel();
        if ($model->load(\Yii::$app->request->post())) {
            if (!$model->save()) {
                print_r($model->getErrors());
            }
        }
        return $this->redirect(['index']);
    }

    public function actionUpdate($id, $path) {
        print_r(\Yii::$app->request->post());
        $model = $this->findItem($id);

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
            }
        }
        return $this->redirect(['index']);
    }

    public function actionDelete($id) {
        $this->findItem($id)->delete();
        return $this->redirect(['index']);
    }

    public static function loadMenu() {
        if (($model = MenuItemModel::find()->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private static function findItem($id){
        if (($model = MenuItemModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
