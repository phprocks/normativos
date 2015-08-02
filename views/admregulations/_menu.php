    <?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [
                    [
                        'label'   => 'Gestão dos Documentos',
                        'url'     => ['/admregulations/index'],
                    ],
                    [
                        'label'   => 'Categorias',
                        'url'     => ['/adm-menu-items/index'],
                    ],
                    [
                        'label'   => 'Minha Conta',
                        'url'     => ['/user/account'],
                    ],
                    [
                        'label'   => 'Sair',
                        'url'     => ['/user/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],                       
                ],
                'options' => ['class' =>'nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
            ]);
    ?>