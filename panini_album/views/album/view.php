<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = 'Album: '.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que quiere borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Listar', ['album/index'], ['class' => 'btn btn-success']) ?>             
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
            'descripcion:ntext',
            'ano',
            [
                'attribute' => 'estado',
                'format' => 'raw',
                'value' => $model->estado==1 ? 'Público' : 'Privado',
            ],            
            /*[
              'attribute'=>'usuario_id',
              'value'=>$model->usuario->usuario,
            ],*/   
        ],
    ]) ?>

</div>

<div class="seccion-index">
    
    <h1>Secciones de <?php echo $model->nombre ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Sección', ['/seccion/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'orden',
            'num_hojas',
            //'album_id',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                Yii::$app->urlManager->createUrl(['seccion/view',
                                    'id' => $model->id]),
                                [
                                'title' => Yii::t('yii', 'Ver'),
                        ]);
                    },                    
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                Yii::$app->urlManager->createUrl(['seccion/update',
                                    'id' => $model->id]),
                                [
                                'title' => Yii::t('yii', 'Editar'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 
                                Yii::$app->urlManager->createUrl(['seccion/delete',
                                    'id' => $model->id]), 
                            [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Esta seguro de borrar este item?'),
                            'data-method' => 'post',
                   ]);
                   }
                ],                
            ],
            
           
        ],       
    ]); ?>

</div>
