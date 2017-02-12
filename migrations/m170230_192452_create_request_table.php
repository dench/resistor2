<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request`.
 */
class m170230_192452_create_request_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'mycity' => $this->string(),
            'rooms' => $this->string(),
            'distance' => $this->string(),
            'sqr' => $this->string(),
            'budget' => $this->string(),
            'region' => $this->string(),
            'text' => $this->string(),
            'status_id' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-request-status_id', 'request', 'status_id', 'request_status', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-request-status_id', 'request');

        $this->dropTable('request');
    }
}
