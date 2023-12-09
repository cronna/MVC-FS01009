<?php 

namespace app\controllers;

use app\core\InitController;
use app\lib\UserOperation;
use app\models\NewsModel;
class ChannelsController extends InitController
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

    public function actionChannel(){
        $newsModel = new NewsModel();
        $channel_id = !empty($_GET['channel_id']) ? $_GET['channel_id'] : null;
        $channel = null;
        $error_message = '';

        $this->view->title = $newsModel->getChannelById($channel_id);

        if(!empty($channel_id)){
            $newsModel = new NewsModel();
            $channel = $newsModel->getChannelById($channel_id);

            if(empty($channel)){
                $error_message .= 'канал не найден<br>';
            }else{
                $channelContent = $newsModel->getChannelContent($channel_id);
            }
        }else{
            $error_message .= 'нет такого id<br>';
        }

        

        $this->render('/paper', [
            'sidebar' => UserOperation::getMenuLink(),
            'error_message' => $error_message,
            'channel' => $channel,
            'content' => $channelContent
        ]);
    }
}