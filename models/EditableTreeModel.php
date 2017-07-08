<?php

namespace app\models;

use Yii;

/**
 */
class EditableTreeModel extends \yii\base\Model {

    const PATH_DELIMER = ',';

    public $root;

    /**
     * собрать дерево
     * @param array() $items
     */
    public function assembleFromItems($items) {
        $rootItem = new MenuItemModel(['link'=> 'ROOT', 'name'=> 'ROOT']);
        $this->root = new TreeNode($rootItem);
        
        foreach ($items as $item) {
            $this->insertRecursively($this->root, $item, $item->getPath());
//            exit();
        }
//        echo '<pre>'; print_r($this->root);echo '</pre>'; 
//        exit();
    }

    /**
     * 
     * @param TreeNode $node
     * @param MenuItemModel $item
     * $param Array $path
     */
    private function insertRecursively($node, $item, $path) {
        
        if (count($path) == 0) {
            $node->addChild($item);
        } else {
            $lastId = array_shift($path);
            foreach ($node->childs as $node) {
                if ($node->item->id == $lastId) {
                    $this->insertRecursively($node, $item, $path);
                }
            }
        }
    }

    public function disassembleToItems() {
        foreach ($array as $value) {
            // разобрать
        }
    }

    /**
     * 
     * @param function $callBack
     */
    public function each($callBack){
        $this->eachRecursively($callBack, $this->root, 0, 0);
    }
    
    /**
     * 
     * @param TreeNode $node
     * @param function $callBack
     */
    private function eachRecursively($callBack, $node , $level, $index){
        $childs = $node->childs;
        $callBack($node, $level, $index);
        for ($i = 0; $i < count($childs); $i++) {
            $this->eachRecursively($callBack, $childs[$i], $level+1, $i);
        }
    }
    
    public function rules() {
        return [
            ['root', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'root' => 'Дерево',
        ];
    }
    

}

class TreeNode {

    public $parent;
    public $childs;
    public $item;

    public function __construct($item) {
        $this->item = $item;
        $this->childs = [];
    }

    /**
     * 
     * @param MenuItemModel $item
     */
    public function addChild($item) {
        $node = new TreeNode($item);
        $node->parent = $this;
        array_push($this->childs, $node);
    }

}
