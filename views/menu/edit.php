<?php
/* @var $this yii\web\View 
 * @var $model app\models\MenuItemModel
 * @var $action app\models\MenuItemModel
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$title = $action=='create' ? 'Добавить меню' : 'Редактировать меню';
?>
<div class="center-block" style="width: 60%;">
<h1><?= $title ?></h1>

<?php $form = ActiveForm::begin(['action' => ['save']]);?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'link') ?>
<?= $form->field($model, 'parents_id') ?>
<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
</div>

