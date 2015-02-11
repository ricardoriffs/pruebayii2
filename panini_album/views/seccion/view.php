<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seccion */

$this->title = 'Sección: '.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Secciones', 'url' => ['album/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-view">

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
            'orden',
            'num_hojas',
            [
              'attribute'=>'album_id',
              'value'=>$model->album->nombre,
            ],               
        ],
    ]) ?>

</div>

<div class="seccion-view">

    <h1>Hojas de <?= $model->nombre; ?></h1>
    
    <?php $hojas = $model->num_hojas; 
          $i = 1;
    ?>
    
    <?php while($i <= $hojas): ?>
    <div id="hojas">
        <?php echo 'pag. '.$i; ?>
    </div>
    <?php $i++; 
    endwhile; ?>
</div>
