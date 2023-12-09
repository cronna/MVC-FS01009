<?php 

namespace app\controllers;

use app\core\InitController;
use app\lib\UserOperation;
use app\models\NewsModel;
class PapersController extends InitController
{
    public function behaviors()
    {
        return [
            'access' => [
                'rules' => [
                    [
                        'actions' => ['list'],
                        'roles' => [UserOperation::RoleUser, UserOperation::RoleAdmin],
                        'matchCallback' => function() {
                            $this->redirect('/user/login');
                        }    
                    ],
                    [
                        'actions' => ['add', 'edit', 'delete'],
                        'roles' => [UserOperation::RoleAdmin],
                        'matchCallback' => function() {
                            $this->redirect('/user/list');
                        }
                    ]
                ]
            ]
        ];
    }

    public function actionPapers(){
        $this->view->title = 'Новости';

        $newsModel  = new NewsModel();
        $papers = $newsModel->getListPapers();

        $this->render('papers', [
            'sidebar' => UserOperation::getMenuLink(),
            'papers' => $papers,
            'role' => UserOperation:: getRoleUser()
        ]);
    }
    public function actionPaper(){
        $this->view->title = 'редактирование новости';

        $paper_id = !empty($_GET['paper_id']) ? $_GET['paper_id'] : null;
        $paper = null;
        $error_message = '';

        if(!empty($news_id)){
            $newsModel = new NewsModel();
            $paper = $newsModel->getPaperById($paper_id);

            if(empty($paper)){
                $error_message .= 'новость не найдена<br>';
            }
        }else{
            $error_message .= 'нет такого id<br>';
        }

        $this->render('/paper', [
            'sidebar' => UserOperation::getMenuLink(),
            'error_message' => $error_message,
            'paper' => $paper
        ]);
    }
}