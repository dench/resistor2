<?php

use yii\db\Migration;

/**
 * Handles the creation of table `object_status`.
 */
class m170115_171128_create_object_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_status', [
            'id' => $this->primaryKey(),
            'class' => $this->string(20),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('object_status_lang', [
            'object_status_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('object_status_id-lang_id', 'object_status_lang', ['object_status_id', 'lang_id']);

        $this->addForeignKey('fk-object_status_lang-object_status_id', 'object_status_lang', 'object_status_id', 'object_status', 'id', 'CASCADE');

        $this->addForeignKey('fk-object_status_lang-lang_id', 'object_status_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'class' => 'success',
                'en' => 'Enabled',
                'ru' => 'Включено',
            ],
            [
                'class' => 'default',
                'en' => 'Disabled',
                'ru' => 'Отключено',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('object_status', ['class' => $item['class']]);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('object_status', ['position' => $id], ['id' => $id]);
            $this->batchInsert('object_status_lang', ['object_status_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-object_status_lang-lang_id', 'object_status_lang');

        $this->dropForeignKey('fk-object_status_lang-object_status_id', 'object_status_lang');

        $this->dropTable('object_status_lang');
        
        $this->dropTable('object_status');
    }
}
