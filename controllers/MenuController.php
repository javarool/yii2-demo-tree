<?php

namespace app\controllers;

use app\models\MenuItemModel;

class MenuController extends \yii\web\Controller {

    public function actionIndex($open = false) {
        $items = $this->loadMenu();
        $tree = new \app\models\EditableTreeModel();
        $tree->assembleFromItems($items);

        return $this->render('index', [
                    'model' => $items,
                    'tree' => $tree,
                    'tree_open' => $open,
        ]);
    }

    public function actionCreate($path = '') {
        $model = new MenuItemModel();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
            }
        } else {
            $model->parents_id = $path;
        }
        return $this->render('edit', [
                    'model' => $model,
                    'action' => 'create'
        ]);
    }

    public function actionUpdate($id, $path = '') {
        $model = $this->findItem($id);

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
            }
        } else {
            $model->parents_id = $path;
        }
        return $this->render('edit', [
                    'model' => $model,
                    'action' => 'update'
        ]);
    }

    public function actionDelete($id) {
        $model = $this->findItem($id);
//        p($model);exit();
        $path = $model->getPathForChilds();
        if ($path != '') {
            $answer2 = MenuItemModel::deleteAll('`parents_id` LIKE \'' . $path . '%\'');
            p($answer2);
        }
        
        $model->delete();
        return $this->redirect(['index']);
    }

    public static function loadMenu() {
        if (($model = MenuItemModel::find()->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private static function findItem($id) {
        if (($model = MenuItemModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
