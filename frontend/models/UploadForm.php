<?php
namespace frontend\models;

use yii\base\Model;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $title;
    public $texts;
    public $img_ad;
    public $ctg;

    public function rules()
    {
        return [
            [['title','texts' ,'ctg'] ,'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            
            return true;
        } else {
            return false;
        }
    }
    public function save(){
        $sql="insert into article (ctg_id, image_adress, title, full_text_article) values (:ctg, :img, :title, :texts)";
        $item=[':img'=>'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension,
                ':title'=>$this->title,
                ':texts'=>$this->texts,
                ':ctg'=>$this->ctg];
                $command_sql =\Yii::$app->db->createCommand($sql)->bindValues($item);
                return $command_sql->execute();

    }
    public function getAllArticle(){
        $sql="select * from article";
        $command_sql =\Yii::$app->db->createCommand($sql);
        return $command_sql->queryAll();
    }
    public function getOneArticle($id){
        $sql="select * from article where id=:id";
        $command_sql =\Yii::$app->db->createCommand($sql)->bindValue(':id' , $id);
        return $command_sql->queryOne();
    }
}