<aside class="main-sidebar">

    <section class="sidebar">

        <?= app\modules\admin\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => Yii::t('app', 'Offers'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/offer']],
                    ['label' => Yii::t('app', 'Properties'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/property']],
                    ['label' => Yii::t('app', 'Objects'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/object']],
                    ['label' => Yii::t('app', 'Requests'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/request']],
                    ['label' => Yii::t('app', 'Users'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/user']],
                    ['label' => Yii::t('app', 'Pages'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/page']],
                    ['label' => Yii::t('app', 'Regions'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/region']],
                    ['label' => Yii::t('app', 'Cities'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/location']],
                    ['label' => Yii::t('app', 'Views'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/view']],
                    ['label' => Yii::t('app', 'Nearby'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/near']],
                    ['label' => Yii::t('app', 'Parking'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/parking']],
                ],
            ]
        ) ?>

    </section>

</aside>
