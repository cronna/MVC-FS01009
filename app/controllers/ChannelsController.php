<?php 

namespace app\controllers;

use app\core\InitController;
use app\lib\UserOperation;
use app\models\NewsModel;
class PostsController extends InitController
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

    public function actionChannels(){
        $this->view->title = 'каналы';
    
        $newsModel  = new NewsModel();
        $channels = $newsModel->getListChannels();
    
        $this->render('channels', [
            'sidebar' => UserOperation::getMenuLink(),
            'channels' => $channels,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function actionChannel{
        
    }
}