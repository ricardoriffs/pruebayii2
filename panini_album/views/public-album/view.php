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
        <?= Html::a('Listar', ['public-album/index'], ['class' => 'btn btn-success']) ?>             
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
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                Yii::$app->urlManager->createUrl(['public-album/view-seccion',
                                    'id' => $model->id]),
                                [
                                'title' => Yii::t('yii', 'Ver'),
                        ]);
                    }
                ],                
            ],
            
           
        ],       
    ]); ?>

</div>
