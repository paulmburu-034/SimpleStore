<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reorder".
 *
 * @property int $ReorderID
 * @property int|null $ProductID
 * @property string|null $Status
 */
class Reorder extends \yii\db\ActiveRecord
{
    public $QuantityAdded;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Reorder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProductID'], 'integer'],
            [['Status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ReorderID' => 'Reorder ID',
            'ProductID' => 'Product ID',
            'Status' => 'Status',
        ];
    }
}
