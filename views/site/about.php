<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php
echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    //'heading' => 'Options',
    'items' => [
        [
            'url' => '#',
            'label' => 'Home',
            'icon' => 'home'
        ],
        [
            'label' => 'Help',
            'icon' => 'question-sign',
            'items' => [
                ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
            ],
        ],
    ],
]);      
?>

</div>
