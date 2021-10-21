<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrador do Sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Administrador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'login',
            'senha',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Tem certezxa que deseja excluir este item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            
        ],
        ]
    ]); ?>


</div>
