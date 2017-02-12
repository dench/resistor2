<?php

use yii\db\Migration;

/**
 * Handles the creation of table `object_image`.
 */
class m170121_192158_create_object_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_image', [
            'object_id' => $this->integer()->notNull(),
            'image_id' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->addPrimaryKey('pk-object_id-image_id', 'object_image', ['object_id', 'image_id']);

        $this->addForeignKey('fk-object_image-object_id', 'object_image', 'object_id', 'object', 'id', 'CASCADE');

        $this->addForeignKey('fk-object_image-image_id', 'object_image', 'image_id', 'image', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-object_image-image_id', 'object_image');

        $this->dropForeignKey('fk-object_image-object_id', 'object_image');

        $this->dropPrimaryKey('pk-object_id-image_id', 'object_image');

        $this->dropTable('object_image');
    }
}
