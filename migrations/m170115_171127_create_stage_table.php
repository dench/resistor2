<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stage`.
 */
class m170115_171127_create_stage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('stage', [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('stage_lang', [
            'stage_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('stage_id-lang_id', 'stage_lang', ['stage_id', 'lang_id']);

        $this->addForeignKey('fk-stage_lang-stage_id', 'stage_lang', 'stage_id', 'stage', 'id', 'CASCADE');

        $this->addForeignKey('fk-stage_lang-lang_id', 'stage_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'en' => 'Key Ready',
                'ru' => 'Полностью постоено',
            ],
            [
                'en' => 'Under Construction',
                'ru' => 'В стадии строительства',
            ],
            [
                'en' => 'Off Plan',
                'ru' => 'В планах',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('stage', []);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('stage', ['position' => $id], ['id' => $id]);
            $this->batchInsert('stage_lang', ['stage_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-stage_lang-lang_id', 'stage_lang');

        $this->dropForeignKey('fk-stage_lang-stage_id', 'stage_lang');

        $this->dropTable('stage_lang');
        
        $this->dropTable('stage');
    }
}
