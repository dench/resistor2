<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type`.
 */
class m170115_171120_create_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('type', [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('type_lang', [
            'type_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('type_id-lang_id', 'type_lang', ['type_id', 'lang_id']);

        $this->addForeignKey('fk-type_lang-type_id', 'type_lang', 'type_id', 'type', 'id', 'CASCADE');

        $this->addForeignKey('fk-type_lang-lang_id', 'type_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'en' => 'Villa',
                'ru' => 'Вилла',
            ],
            [
                'en' => 'Apartments',
                'ru' => 'Апартаменты',
            ],
            [
                'en' => 'Townhouse',
                'ru' => 'Таунхаус',
            ],
            [
                'en' => 'Building plot',
                'ru' => 'Строительный участок',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('type', []);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('type', ['position' => $id], ['id' => $id]);
            $this->batchInsert('type_lang', ['type_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-type_lang-lang_id', 'type_lang');

        $this->dropForeignKey('fk-type_lang-type_id', 'type_lang');

        $this->dropTable('type_lang');
        
        $this->dropTable('type');
    }
}
