<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m220530_072038_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'qty' => $this->integer()->notNull()->defaultValue(1),
            'total_price' => $this->integer()->notNull(),
            'descriotion' => $this->text(),
            'created_at' =>  $this->dateTime()->notNull(),
            'updated_at' =>  $this->dateTime()->notNull()
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-order-product_id',
            'order',
            'product_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-order-product_id',
            'order',
            'product_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `order`
        $this->dropForeignKey(
            'fk-order-product_id',
            'order'
        );
        // drops index for column `product_id`
        $this->dropIndex(
            'idx-order-product_id',
            'order'
        );

        $this->dropTable('{{%order}}');
    }
}
