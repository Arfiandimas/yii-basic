<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{product}}';
    }

    public function rules()
    {
        return [
            [['author_id', 'product_category_id', 'name', 'qty', 'price', 'created_at', 'updated_at'], 'required']
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'product_category_id']);
    }
}