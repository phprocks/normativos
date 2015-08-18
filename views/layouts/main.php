<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = 'Sicoob Crediriodoce - Portal de Instrumentos Normativos';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Html::encode($this->title),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Seja bem-vindo '.Yii::$app->user->displayName, 'url' => ['/user/account'], 'visible' => !Yii::$app->user->isGuest,],
                    ],
                // 'items' => [
                //     ['label' => 'Home', 'url' => ['/site/index']],
                //     ['label' => 'About', 'url' => ['/site/about']],
                //     ['label' => 'Contact', 'url' => ['/site/contact']],
                //     Yii::$app->user->isGuest ?
                //         ['label' => 'Login', 'url' => ['/site/login']] :
                //         ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                //             'url' => ['/site/logout'],
                //             'linkOptions' => ['data-method' => 'post']],
                // ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => false,
            ]) ?>
            <?= $content ?>
        </div>
    </div>
    <div style="background-image: url('images/footer.jpg'); height: 29px;"></div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">Portal de Instrumentos Normativos - &copy; Sicoob Crediriodoce <?= date('Y') ?></p>
            <p class="pull-right"><i class="fa fa-lock"></i>
            <?php echo Html::a('Administração', ['/admregulations/index'], ['style'=>'color:#fff;']);?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
