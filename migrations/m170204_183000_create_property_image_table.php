<?php

use yii\db\Migration;

/**
 * Handles the creation of table `property_image`.
 */
class m170204_183000_create_property_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('property_image', [
            'property_id' => $this->integer()->notNull(),
            'image_id' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->addPrimaryKey('pk-property_id-image_id', 'property_image', ['property_id', 'image_id']);

        $this->addForeignKey('fk-property_image-property_id', 'property_image', 'property_id', 'property', 'id', 'CASCADE');

        $this->addForeignKey('fk-property_image-image_id', 'property_image', 'image_id', 'image', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-property_image-image_id', 'property_image');

        $this->dropForeignKey('fk-property_image-property_id', 'property_image');

        $this->dropPrimaryKey('pk-property_id-image_id', 'property_image');

        $this->dropTable('property_image');
    }
}
