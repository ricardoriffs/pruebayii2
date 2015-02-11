<?php

namespace app\controllers;

use Yii;
use app\models\Album;
use app\models\Seccion;
use app\models\search\Album as AlbumSearch;
use app\models\search\Seccion as SeccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PublicAlbumController implements the CRUD actions for Album model.
 */
class PublicAlbumController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->searchPublic(Yii::$app->request->queryParams);
        $new_album = array();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'new_album'  => $new_album 
        ]);
    }

    /**
     * Displays a single Album model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $searchModel = new SeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
        ]);         
    }
    
    public function actionClonar($id)
    {
        $new_album = array();
        $album = $this->findModel($id);
        
        if ($album === null) {
            throw new NotFoundHttpException;
        }
            $new_album = new Album();
            $new_album->nombre = $album->nombre;
            $new_album->descripcion = $album->descripcion;
            $new_album->ano = $album->ano;
            $new_album->estado = 0;
            $new_album->usuario_id = Yii::$app->user->getId();
            $new_album->save();       

        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->searchPublic(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'new_album' => $new_album
        ]);       
    }      
    
    public function actionViewSeccion($id)
    {
        
        $searchModel = new SeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('viewSeccion', [
            'model' => $this->findModelSeccion($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
        ]);         
    }    

    /**
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelSeccion($id)
    {
        if (($model = Seccion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }    
}
