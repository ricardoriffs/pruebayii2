<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Album */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albumes Públicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    if(!Yii::$app->user->isGuest){
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'nombre',
            'descripcion:ntext',
            'ano',
            // 'usuario_id',
                ['class' => 'yii\grid\ActionColumn',
                  'template' => '{view} {clonar}',
                  'buttons' => [
                        'clonar' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-share"></span>', 
                                    Yii::$app->urlManager->createUrl(['public-album/clonar',
                                        'id' => $model->id]), 
                                [
                                'title' => Yii::t('yii', 'Clonar'),
                                'data-confirm' => Yii::t('yii', 'Esta seguro de clonar este Album a su cuenta?'),
                                'data-method' => 'post',
                       ]);
                       }                  
                  ],                
                ],        
        ],
    ]); ?>
    <?php } else { ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'nombre',
            'descripcion:ntext',
            'ano',
            // 'usuario_id',
                ['class' => 'yii\grid\ActionColumn',
                  'template' => '{view}',                
                ],        
        ],
    ]); 
    } ?>

    <p><span style="font-weight: bold;">NOTA: </span>¿Desea clonar el album público de alguien más dentro de su cuenta de usuario?, solamente debe logearse como usuario y seleccionar la acción "clonar". (Botón: <?php echo Html::img('../image/panini_clonar.png'); ?>)<p>    
    <?php 
    $i = 0; 
    if(isset($new_album)):
    foreach ($new_album as $album):
         echo 'info: '.$album.$i++; 
     endforeach; 
     endif;
     ?>
</div>
