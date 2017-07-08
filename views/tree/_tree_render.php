<?php

/* @var $this yii\web\View 
 * @var $tree app\models\EditableTreeModel
 */
use app\models\TreeNode;
use yii\helpers\Html;
const tabOffset = 15;

$script = <<< JS
    function onTreeSpanClick(e){
        var div = e.parentNode.childNodes[e.parentNode.childNodes.length-2];
        var state = div.style.display;
        if (state=='none') {
            state = '';
            e.className = 'glyphicon glyphicon-minus';
        } else {
            state = 'none';
            e.className = 'glyphicon glyphicon-plus';
        }
        div.style.display = state;
    }
JS;
$this->registerJs($script, yii\web\View::POS_HEAD);
paintNodeRecursive($tree->root, 0, $tree_open);
/**
 * @property \yii\widgets\ActiveForm $form Description
 */

/**
 * 
 * @param TreeNode $node
 * @param type $level
 * @return type
 */
function paintNodeRecursive($node, $level, $is_open, $show_root = false) {

    if (!$node instanceof TreeNode) {
        echo 'Incorrect tree model';
        return;
    }
    if ($show_root || ($level > 0)) {
        paintLeafBegin($node->item, $node->parent->item->getPathForChilds(), $level, $is_open);
    }


    if (isset($node->childs)) {
        foreach ($node->childs as $childNode) {
            paintNodeRecursive($childNode, ($level + 1), $is_open, $show_root);
        }
    }
    if ($show_root || ($level > 0)) {
        paintLeafEnd($node->item, $level);
    }
}

/**
 * 
 * @param app\models\MenuItemModel $item
 * @param type $level
 */
function paintLeafBegin($item, $parentPath,  $level,  $open = true) {
    $style = ['padding' => '2px'];
    ?>
    <?= Html::beginTag('div', ['style' => ['margin-left' => ($level * tabOffset) . 'px']]); ?>
    <?= Html::tag('span','', [
        'class' => $open ? 'glyphicon glyphicon-minus' : 'glyphicon glyphicon-plus', 
        'onclick' => 'return onTreeSpanClick(this);',
        'style' => [
            'cursor' => 'pointer',
            'padding' => '4px']]) ?>
    <?php
    if ($item->id == -1) {
        echo Html::a('...', ['create', 'path' => $parentPath], ['title'=>'Добавить', 'class' => 'glyphicon glyphicon-pencil', 'style' => $style]);
    } else {
            echo Html::a('['.$item->name//.' id:'.$item->id
                    .'] ', $item->link);
        if ($level > 0) {            
            echo Html::a('', ['update', 'id' => $item->id, 'path' => $item->parents_id], ['title'=>'Редактировать', 'class' => 'glyphicon glyphicon-edit', 'style' => $style]);
            echo Html::a('', ['delete', 'id' => $item->id, 'path' => $item->parents_id], ['title'=>'Удалить', 'class' => 'glyphicon glyphicon-remove', 'style' => $style]);
        }
        
    }
    ?>
    <?= Html::beginTag('div', ['style' => ['display' => ($open ? 'block' : 'none'), 'border-left'=>'1px dotted black']]); ?>
    <?php
}

function paintLeafEnd($item, $level) {
    ?>
    <?= Html::endTag('div'); ?>
    <?= Html::endTag('div'); ?>
    <?php

}
?>


