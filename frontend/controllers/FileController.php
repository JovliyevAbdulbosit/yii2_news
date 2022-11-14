<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\UploadForm;
use yii\web\UploadedFile;
use Page;
class FileController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost&& $model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()  && $model->save()){
                  Yii::$app->session->setFlash('success','success add');
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionDetail($page){
       $model = new UploadForm();
       $sql="SELECT * FROM ctgory ";
        $command_sql =\Yii::$app->db->createCommand($sql)
        ->queryAll();

        return $this->render('detail' , ['article' => $model->getOneArticle($page) ,'ctg'=>$command_sql]);
    }
   public function actionCtg($page){
       $model = new UploadForm();
       $sql="SELECT * FROM ctgory ";
       $sql1="select * from article where ctg_id=:param";
        $command_sql =\Yii::$app->db->createCommand($sql)
        ->queryAll();
        $ctg_all=\Yii::$app->db->createCommand($sql1)->bindValue(':param' , $page) ->queryAll();

        return $this->render('ctg' , ['article' => $model->getOneArticle($page) ,'ctg'=>$command_sql , 'articles'=>$ctg_all]);
    }
    public function actionSearch(){
        $model = new UploadForm();
       $sql="SELECT * FROM ctgory ";
       $sql1="select * from article where title like :param";
        $command_sql =\Yii::$app->db->createCommand($sql)
        ->queryAll();
        $page=Yii::$app->request->getQueryParams()['search'];
        $ctg_all=\Yii::$app->db->createCommand($sql1)->bindValue(':param' ,'%'.$page.'%') ->queryAll();
        return $this->render('search' , ['ctg'=>$command_sql , 'articles'=>$ctg_all , 'search'=>$page]);
    }
}