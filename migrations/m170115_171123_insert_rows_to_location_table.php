<?php

use yii\db\Migration;

class m170115_171123_insert_rows_to_location_table extends Migration
{
    public function up()
    {
        $items = [
            [1 => 'Ayia Triada'],
            [1 => 'Dherynia'],
            [1 => 'Frenaros'],
            [1 => 'Kapparis'],
            [1 => 'Liopetri'],
            [1 => 'Paralimni'],
            [1 => 'Paralimni Villa'],
            [1 => 'Sotira'],
            [1 => 'Vrysoulles'],
            [1 => 'Xylofagou'],
            [2 => 'Ayia Thekla'],
            [2 => 'Cavo Greco'],
            [2 => 'Farmagusta'],
            [2 => 'Kapparis'],
            [2 => 'Paralimni'],
            [2 => 'Pernera'],
            [2 => 'Protaras'],
            [2 => 'Mersinia'],
            [3 => 'Alaminos'],
            [3 => 'Aradippou'],
            [3 => 'Dekelia'],
            [3 => 'Kalavassos'],
            [3 => 'Kiti'],
            [3 => 'Larnaca'],
            [3 => 'Lefkara'],
            [3 => 'Levadia'],
            [3 => 'Maroni'],
            [3 => 'Mazotos'],
            [3 => 'Moutayiaka'],
            [3 => 'Ormidia'],
            [3 => 'Oroklini'],
            [3 => 'Pervolia'],
            [3 => 'Pyla'],
            [3 => 'Tersefanou'],
            [3 => 'Zygi'],
            [4 => 'Agia Phyla'],
            [4 => 'Agios Athanasios'],
            [4 => 'Agios Nectarios'],
            [4 => 'Agios Nicolaos'],
            [4 => 'Agios Tuchonas'],
            [4 => 'Akrotiri Peninsula'],
            [4 => 'Amathus'],
            [4 => 'Amathusa'],
            [4 => 'Anogyra'],
            [4 => 'Apeshia'],
            [4 => 'Apsiou'],
            [4 => 'Arakapas'],
            [4 => 'Armenochori'],
            [4 => 'Asgata'],
            [4 => 'Asomatos'],
            [4 => 'Asos'],
            [4 => 'Ayia Trias'],
            [4 => 'Ayia Trychonas'],
            [4 => 'Ayios Athanasios'],
            [4 => 'Columbia'],
            [4 => 'Ekali'],
            [4 => 'Episkopi'],
            [4 => 'Erimi'],
            [4 => 'Finikaria'],
            [4 => 'Fissouri'],
            [4 => 'Kallavasos'],
            [4 => 'Kalo Chorio'],
            [4 => 'Kalogiri'],
            [4 => 'Katholiki'],
            [4 => 'Kathollka'],
            [4 => 'Kato Polemida'],
            [4 => 'Kellaki'],
            [4 => 'Kivides'],
            [4 => 'Kolossi'],
            [4 => 'Limassol'],
            [4 => 'Limassol Marina'],
            [4 => 'Liopetri'],
            [4 => 'Lofou'],
            [4 => 'Mesa Yitonia'],
            [4 => 'Monagroulli'],
            [4 => 'Moni'],
            [4 => 'Moutayiaka'],
            [4 => 'Mouttagiaka'],
            [4 => 'Narcissos'],
            [4 => 'Neopolis'],
            [4 => 'Palodia'],
            [4 => 'Panthea'],
            [4 => 'Parekklisia'],
            [4 => 'Pera Pedi'],
            [4 => 'Petrou & Palou'],
            [4 => 'Pissouri'],
            [4 => 'Polemidia'],
            [4 => 'Prastio'],
            [4 => 'Psematismenos'],
            [4 => 'Pyrgos'],
            [4 => 'Sfalaggiotissa'],
            [4 => 'Souni'],
            [4 => 'Tochni'],
            [4 => 'Trimiklini'],
            [4 => 'Vouni'],
            [4 => 'Yermasoyia'],
            [4 => 'Ypsonas'],
            [4 => 'Zakaki'],
            [4 => 'Zanatzia'],
            [4 => 'Zygi'],
            [4 => 'Germasoyia'],
            [6 => 'Anarita'],
            [6 => 'Konia'],
            [6 => 'Peyia'],
            [6 => 'Sea Caves'],
            [6 => 'Mandria'],
            [6 => 'Venus Rock Golf Resort'],
            [6 => 'Yeroskipou'],
            [6 => 'Town Centre'],
            [7 => 'Neo Chorio'],
            [7 => 'Pomos'],
            [7 => 'Kinousa']
        ];

        foreach ($items as $item) {
            $region_id = key($item);
            $name = $item[$region_id];
            $this->insert('location', ['region_id' => $region_id]);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('location', ['position' => $id], ['id' => $id]);
            $this->batchInsert('location_lang', ['location_id', 'lang_id', 'name'], [
                [$id, 'en', $name],
                [$id, 'ru', $name],
            ]);
        }
    }

    public function down()
    {
        $this->execute('set foreign_key_checks = 0');

        $this->truncateTable('location');

        $this->execute('set foreign_key_checks = 1');
    }
}
