    <?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [
                    [
                        'label'   => '<i class="fa fa-files-o"></i> Gestão dos Documentos',
                        'url'     => ['/admregulations/index'],
                    ],
                    [
                        'label'   => '<i class="fa fa-tags"></i> Gestão das Categorias',
                        'url'     => ['/adm-menu-items/index'],
                    ],
                    [
                        'label'   => '<i class="fa fa-user"></i> Minha Conta',
                        'url'     => ['/user/account'],
                    ],
                    [
                        'label'   => '<i class="fa fa-power-off"></i> Sair do Sistema',
                        'url'     => ['/user/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],                       
                ],
                'options' => ['class' =>'nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
            ]);
    ?>