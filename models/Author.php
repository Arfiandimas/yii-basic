<?php

namespace app\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{user}}';
    }

    public function products()
    {
        return $this->hasMany(Product::class, ['author_id' => 'id']);
    }
}