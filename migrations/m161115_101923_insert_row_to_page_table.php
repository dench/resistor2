<?php

use yii\db\Migration;

class m161115_101923_insert_row_to_page_table extends Migration
{
    public function safeUp()
    {
        $this->insert('page', [
            'slug' => 'about',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $id = Yii::$app->db->getLastInsertID();

        $this->batchInsert('page_lang', ['page_id', 'lang_id', 'name', 'title'], [
            [$id, 'en', 'About Cyprus', 'About Cyprus'],
            [$id, 'ru', 'О Кипре', 'О Кипре'],
        ]);
    }

    public function safeDown()
    {
        $this->delete('page', ['slug' => 'about']);
    }
}
