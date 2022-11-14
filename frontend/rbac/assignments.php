<?php
use common\models\User;
$id=Yii::$app->user->id;
$user = User::find()
    ->where(['id' => $id])
    ->one();
return [
    $id => [
        $user->role,
    ],
];
