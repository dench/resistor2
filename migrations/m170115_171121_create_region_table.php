<?php

use yii\db\Migration;

/**
 * Handles the creation of table `region`.
 */
class m170115_171121_create_region_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('region_lang', [
            'region_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('region_id-lang_id', 'region_lang', ['region_id', 'lang_id']);

        $this->addForeignKey('fk-region_lang-region_id', 'region_lang', 'region_id', 'region', 'id', 'CASCADE');

        $this->addForeignKey('fk-region_lang-lang_id', 'region_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'en' => 'Famagusta',
                'ru' => 'Фамагуста',
            ],
            [
                'en' => 'Ayia Napa',
                'ru' => 'Айия-Напа',
            ],
            [
                'en' => 'Larnaca',
                'ru' => 'Ларнака',
            ],
            [
                'en' => 'Limassol',
                'ru' => 'Лимасол',
            ],
            [
                'en' => 'Nicosia',
                'ru' => 'Никосия',
            ],
            [
                'en' => 'Paphos',
                'ru' => 'Пафос',
            ],
            [
                'en' => 'Polis',
                'ru' => 'Полис',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('region', []);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('region', ['position' => $id], ['id' => $id]);
            $this->batchInsert('region_lang', ['region_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-region_lang-lang_id', 'region_lang');

        $this->dropForeignKey('fk-region_lang-region_id', 'region_lang');

        $this->dropTable('region_lang');

        $this->dropTable('region');
    }
}
