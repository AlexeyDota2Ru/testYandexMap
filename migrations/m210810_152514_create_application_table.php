<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m210810_152514_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'message' => $this->string(200),
            'city' => $this->string(255),
            'address' => $this->string(255),
        ]);

        $this->createIndex(
            'idx-application-user_id',
            'application',
            'user_id'
        );

        $this->addForeignKey(
            'fk-application-user_id',
            'application',
            'user_id',
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
        $this->dropTable('{{%application}}');
    }
}
