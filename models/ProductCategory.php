<?php

namespace app\models;

use yii\db\ActiveRecord;

class ProductCategory extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    private $name;
    private $parrent_id;
    private $created_at;
    private $updated_at;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{product_category}}';
    }

    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required']
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class, ['product_category_id' => 'id']);
    }
}