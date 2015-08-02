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
                        'url'     => ['/category/index'],
                    ],
                    // [
                    //     'label'   => 'Visao geral > Média mensal',
                    //     'url'     => ['/solicitation/by_analyst'],
                    // ],                                   
                ],
                'options' => ['class' =>'nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
            ]);
    ?>