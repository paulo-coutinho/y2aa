<?php

namespace common\components\ui\grid;

use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;

/**
 * Class EnumColumn
 * [
 *      'class' => 'common\components\ui\grid\EnumColumn',
 *      'attribute' => 'role',
 *      'enum' => User::getRoles()
 * ]
 * @package common\components\ui\grid
 */
class EnumColumn extends DataColumn
{

    /**
     * @var array List of value => name pairs
     */
    public $enum = [];
    /**
     * @var bool
     */
    public $loadFilterDefaultValues = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->loadFilterDefaultValues && $this->filter === null) {
            $this->filter = $this->enum;
        }
    }

    /**
     * @param mixed $model
     * @param mixed $key
     * @param int $index
     * @return mixed
     */
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        return ArrayHelper::getValue($this->enum, $value, $value);
    }

}
