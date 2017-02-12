<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request_property_type`.
 */
class m170230_194029_create_request_property_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request_property_type', [
            'request_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-request_property_type', 'request_property_type', ['request_id', 'type_id']);

        $this->addForeignKey('fk-request_property_type-request_id', 'request_property_type', 'request_id', 'request', 'id', 'CASCADE');

        $this->addForeignKey('fk-request_property_type-type_id', 'request_property_type', 'type_id', 'type', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-request_property_type-type_id', 'request_property_type');
        
        $this->dropForeignKey('fk-request_property_type-request_id', 'request_property_type');

        $this->dropTable('request_property_type');
    }
}
