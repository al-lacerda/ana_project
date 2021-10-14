<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entidades */

$this->title = 'Nova Entidade';
$this->params['breadcrumbs'][] = ['label' => 'Entidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
