<?php

use yii\db\Migration;

/**
 * Handles the creation of table `object_near`.
 */
class m170121_190725_create_object_near_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_near', [
            'object_id' => $this->integer()->notNull(),
            'near_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-object_near', 'object_near', ['object_id', 'near_id']);

        $this->addForeignKey('fk-object_near-object_id', 'object_near', 'object_id', 'object', 'id', 'CASCADE');
        
        $this->addForeignKey('fk-object_near-near_id', 'object_near', 'near_id', 'near', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-object_near-near_id', 'object_near');

        $this->dropForeignKey('fk-object_near-object_id', 'object_near');
        
        $this->dropTable('object_near');
    }
}
