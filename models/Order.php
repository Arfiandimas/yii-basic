<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $product_id
 * @property int $qty
 * @property int $total_price
 * @property string|null $descriotion
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $product
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'total_price', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'qty', 'total_price'], 'integer'],
            [['descriotion'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
            'total_price' => 'Total Price',
            'descriotion' => 'Descriotion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(User::className(), ['id' => 'product_id']);
    }
}
