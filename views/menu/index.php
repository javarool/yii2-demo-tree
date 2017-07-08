<?php
/* @var $this yii\web\View 
 * @var $tree app\models\EditableTreeModel
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\views\tree\TreeRender;
?>
<h1>Navigation menu</h1>

<?php
// добавляем пустые модели для создания новых узлов
$tree->each(function($node, $level, $index) {
    $newitem = new app\models\MenuItemModel(['id' => -1, 'name' => '[Новый]']);
    $node->addChild($newitem);
});

echo $this->render('\..\tree\_tree_render', [
'tree' => $tree
 ]);

$form = ActiveForm::begin(['action' => ['update'], 'layout' => 'horizontal']);
echo '<br>';
echo Html::submitButton('Сабмит', ['class' => 'btn btn-primary']);
ActiveForm::end();

echo '<pre>';
print_r($tree);
echo '</pre>';
?>
<?php ?>

