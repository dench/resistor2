<?php

use yii\db\Migration;

/**
 * Handles the creation of table `view`.
 */
class m170115_171125_create_view_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('view', [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('view_lang', [
            'view_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('view_id-lang_id', 'view_lang', ['view_id', 'lang_id']);

        $this->addForeignKey('fk-view_lang-view_id', 'view_lang', 'view_id', 'view', 'id', 'CASCADE');

        $this->addForeignKey('fk-view_lang-lang_id', 'view_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'en' => 'Sea',
                'ru' => 'Море',
            ],
            [
                'en' => 'Mountain',
                'ru' => 'Горы',
            ],
            [
                'en' => 'Town',
                'ru' => 'Город',
            ],
            [
                'en' => 'Forest',
                'ru' => 'Лес',
            ],
            [
                'en' => 'Countryside',
                'ru' => 'Загород',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('view', []);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('view', ['position' => $id], ['id' => $id]);
            $this->batchInsert('view_lang', ['view_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-view_lang-lang_id', 'view_lang');

        $this->dropForeignKey('fk-view_lang-view_id', 'view_lang');

        $this->dropTable('view_lang');

        $this->dropTable('view');
    }
}
