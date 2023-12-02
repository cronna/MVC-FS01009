<?php

namespace app\controllers;

use app\core\InitController;
use app\lib\UserOperation;

class MainController extends InitController
{
    public function actionIndex(){

        

        $this->render('index', [
            'sidebar'=> UserOperation::getMenuLink()
        ]);
    }

    public function actionAbout(){
        $this->render('about', [
            'sidebar'=> UserOperation::getMenuLink()
        ]);
    }

    public function actionReg(){
        $this->redirect('/user/profile');
    }
}