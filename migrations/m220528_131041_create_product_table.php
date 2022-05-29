<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220528_131041_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'product_category_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'qty' => $this->integer()->notNull()->defaultValue(1),
            'price' => $this->bigInteger()->notNull(),
            'created_at' =>  $this->dateTime()->notNull(),
            'updated_at' =>  $this->dateTime()->notNull()
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-product-author_id',
            'product',
            'author_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product-author_id',
            'product',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-product-product_category_id',
            'product',
            'product_category_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product-product_category_id',
            'product',
            'product_category_id',
            'product_category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-product-author_id',
            'product'
        );
        // drops index for column `author_id`
        $this->dropIndex(
            'idx-product-author_id',
            'product'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-product-product_category_id',
            'product'
        );
        // drops index for column `author_id`
        $this->dropIndex(
            'idx-product-product_category_id',
            'product'
        );


        $this->dropTable('{{%product}}');
    }
}
