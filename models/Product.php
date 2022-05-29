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

    public function author()
    {
        return $this->hasOne(Customer::class, ['id' => 'author_id']);
    }

    public function productCategory()
    {
        return $this->hasOne(Customer::class, ['id' => 'product_category_id']);
    }
}