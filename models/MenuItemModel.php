<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_items".
 *
 * @property integer $id
 * @property string $link
 * @property string $name
 * @property string $parents_id
 */
class MenuItemModel extends \yii\db\ActiveRecord {

    const PATH_DELIMER = ',';

    private $path;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'menu_items';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['link', 'name'], 'required'],
            [['name'], 'string'],
            ['parents_id', 'safe'],
            [['link', 'parents_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'name' => 'Name',
            'PATH_DELIMER' => 'Parents ID',
        ];
    }

    public function getPath() {
        if (!isset($this->path)) {
            $this->path = $this::pathToArray($this->parents_id);
        }
        return $this->path;
    }

    public function getPathForChilds() {
        return (($this->parents_id != '') ? $this->parents_id . self::PATH_DELIMER : '')
                . (($this->id == -1) ? '' : $this->id);
    }

    public function setPath($array) {
        $this->parents_id = $this::pathToStr($array);
        unset($this->path);
    }

    public static function pathToArray($str_path) {
        if ($str_path == '') {
            return [];
        }
        $array = explode(self::PATH_DELIMER, $str_path);
        return $array;
    }

    public static function pathToStr($array_path) {
        $str = implode(self::PATH_DELIMER, $array_path);
        return $str;
    }

}
