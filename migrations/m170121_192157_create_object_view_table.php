<?php

use yii\db\Migration;

/**
 * Handles the creation of table `object_view`.
 */
class m170121_192157_create_object_view_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_view', [
            'object_id' => $this->integer()->notNull(),
            'view_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-object_view', 'object_view', ['object_id', 'view_id']);

        $this->addForeignKey('fk-object_view-object_id', 'object_view', 'object_id', 'object', 'id', 'CASCADE');

        $this->addForeignKey('fk-object_view-view_id', 'object_view', 'view_id', 'view', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-object_view-view_id', 'object_view');

        $this->dropForeignKey('fk-object_view-object_id', 'object_view');

        $this->dropTable('object_view');
    }
}
