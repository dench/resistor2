<?php

use yii\db\Migration;

/**
 * Handles the creation of table `property_status`.
 */
class m170204_121320_create_property_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('property_status', [
            'id' => $this->primaryKey(),
            'class' => $this->string(20),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('property_status_lang', [
            'property_status_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('property_status_id-lang_id', 'property_status_lang', ['property_status_id', 'lang_id']);

        $this->addForeignKey('fk-property_status_lang-property_status_id', 'property_status_lang', 'property_status_id', 'property_status', 'id', 'CASCADE');

        $this->addForeignKey('fk-property_status_lang-lang_id', 'property_status_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'class' => 'success',
                'en' => 'Active',
                'ru' => 'Активно',
            ],
            [
                'class' => 'default',
                'en' => 'Hidden',
                'ru' => 'Скрыто',
            ],
            [
                'class' => 'warning',
                'en' => 'Awaiting',
                'ru' => 'В ожидании',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('property_status', ['class' => $item['class']]);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('property_status', ['position' => $id], ['id' => $id]);
            $this->batchInsert('property_status_lang', ['property_status_id', 'lang_id', 'name'], [
                [$id, 'en', $item['en']],
                [$id, 'ru', $item['ru']],
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-property_status_lang-lang_id', 'property_status_lang');

        $this->dropForeignKey('fk-property_status_lang-property_status_id', 'property_status_lang');

        $this->dropTable('property_status_lang');
        
        $this->dropTable('property_status');
    }
}
