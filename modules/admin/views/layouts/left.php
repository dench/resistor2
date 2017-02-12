<aside class="main-sidebar">

    <section class="sidebar">

        <?= app\modules\admin\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => Yii::t('app', 'Offers'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/offer']],
                    ['label' => Yii::t('app', 'Properties'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/property']],
                    ['label' => Yii::t('app', 'Objects'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/object']],
                    ['label' => Yii::t('app', 'Users'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/user']],
                    ['label' => Yii::t('app', 'Pages'), 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/page']],
                ],
            ]
        ) ?>

    </section>

</aside>
