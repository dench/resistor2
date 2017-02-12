<?php

use yii\db\Migration;

/**
 * Handles the creation of table `file`.
 */
class m170102_161251_create_file_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('file', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'path' => $this->string(10)->notNull(),
            'hash' => $this->string(32)->notNull(),
            'extension' => $this->string(10)->notNull(),
            'type' => $this->string(32)->notNull(),
            'size' => $this->integer()->notNull(),
			'name' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-file-user_id', 'file', 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-file-user_id', 'file');

        $this->dropTable('file');
    }
}
