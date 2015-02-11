<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Album;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Album */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albumes de Panini';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
             /*[
             'attribute'=>'nombre',
             'format' => 'raw',
             'value'=>function ($data) {
                        return Html::a('link','view?id=1');
                      },
             ],*/ 
            'descripcion:ntext',
            'ano',
            [
                'attribute' => 'estado',
                'format' => 'raw',
                'value' => function($model) {
                   return $model->estado==1 ? 'Público' : 'Privado';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
