<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m220528_125059_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'parrent_id' => $this->integer(),
            'created_at' =>  $this->dateTime()->notNull(),
            'updated_at' =>  $this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_category}}');
    }
}
