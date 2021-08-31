<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Products".
 *
 * @property int $ProductID
 * @property string|null $ProductName
 * @property int|null $ProductQuantity
 * @property int|null $ReorderLevel
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $Amount_sold;
    public static function tableName()
    {
        return 'Products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProductQuantity', 'ReorderLevel'], 'integer'],
            [['ProductName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ProductID' => 'Product ID',
            'ProductName' => 'Product Name',
            'ProductQuantity' => 'Product Quantity',
            'ReorderLevel' => 'Reorder Level',
        ];
    }
}
