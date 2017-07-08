<?php
/* @var $this yii\web\View 
 * @var $tree app\models\EditableTreeModel
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\views\tree\TreeRender;
?>
<h1>Объектно-ориентированное программирование</h1>
<?php
// добавляем пустые модели для создания новых узлов
$tree->each(function($node, $level, $index) {
    $newitem = new app\models\MenuItemModel(['id' => -1, 'name' => '[Новый]']);
    $node->addChild($newitem);
});

echo Html::a(($tree_open ? 'Свернуть' : 'Развернуть') . 'дерево', ['index', 'open' => !$tree_open], ['class' => 'btn btn-primary']);
?>
<p>
    <?=
    $this->render('\..\tree\_tree_render', [
        'tree' => $tree,
        'tree_open' => $tree_open,
    ]);
    ?>
</p>