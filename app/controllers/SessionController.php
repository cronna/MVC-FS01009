<?php

namespace app\controllers;

use app\core\InitController;
use app\lib\UserOperation;
use app\models\SessionModel;

class SessionController extends InitController
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
                            $this->redirect('/session/list');
                        }
                    ]
                ]
            ]
        ];
    }

    public function actionEdit()
    {
        $this->view->title = 'редактирование сеанса';

        $session_id = !empty($_GET['session_id']) ? $_GET['session_id'] : null;
        $session = null;
        $error_message = '';

        if(!empty($session_id)){
            $sessionModel = new SessionModel();
            $session = $sessionModel->getSessionById($session_id);

            if(empty($session)){
                $error_message .= 'сессия не найдена<br>';
            }
        }else{
            $error_message .= 'нет такого id<br>';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['btn_session_edit_form'])){
            $session_data = !empty($_POST['session']) ? $_POST['session'] : null;

            if(!empty($session_data)){
                if(empty($_FILES['img']['tmp_name'])){
                    $img = null;
                }else{
                    $img = file_get_contents($_FILES['img']['tmp_name']);
                }
                $sessionModel = new SessionModel();
                $result_edit = $sessionModel->edit($session_id, $session_data, $img);

                if($result_edit['result']){
                    $this->redirect("/session/today");
                }else{
                    $error_message .= $result_edit['error_message'];
                }
            }
        }


        $this->render('edit', [
            'sidebar' => UserOperation::getMenuLink(),
            'error_message' => $error_message,
            'session' => $session
        ]);
    }

    public function actionDelete()
    {
        $this->view->title = 'удаление сеанса';
        $session_id = !empty($_GET['session_id']) ? $_GET['session_id'] : null;
        $session = null;
        $error_message = '';

        if(!empty($session_id)){
            $sessionModel = new SessionModel();
            $session = $sessionModel->getSessionById($session_id);

            if(!empty($session)){
                $result_delete = $sessionModel->deleteById($session_id);

                if ($result_delete['result']){
                    $this->redirect("/session/today");
                }else{
                    $result_delete['error_message'];
                }
                
            }else{
                $error_message = "сессия не найдена";
            }
        }else{
            $error_message .= 'нет такого id<br>';
        }

        $this->render('delete', [
            'sidebar' => UserOperation::getMenuLink(),
            'error_message' => $error_message,
            'session' => $session
        ]);
    }

    public function actionToday()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('today', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function action2()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('2', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function action3()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('3', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function action4()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('4', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function action5()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('5', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function action6()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('6', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }

    public function action7()
    {
        $this->view->title = 'сеансы';

        $sessionModel  = new SessionModel();
        $session = $sessionModel->getListSession();

        $this->render('7', [
            'sidebar' => UserOperation::getMenuLink(),
            'session' => $session,
            'role' => UserOperation:: getRoleUser()
        ]);
    }
    

    public function actionAdd()
    {
        $this->view->title = 'добавление сеанса';
        $error_message = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['btn_session_add_form'])){
            $session_data = !empty($_POST['session']) ? $_POST['session'] : null;
            $img = file_get_contents($_FILES['img']['tmp_name']);
            if(!empty($session_data)){
                $sessionModel = new SessionModel();
                $result_add = $sessionModel->add($session_data, $img);

                if($result_add['result']){
                    $this->redirect('/session/today');
                }else{
                    $error_message .= $result_add['error_message'];
                }
            }
        }

        $this->render('add', [
            'sidebar' => UserOperation::getMenuLink(),
            'error_message' => $error_message
        ]);
    }

    public function actionBuy(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['btn_buy_form'])){
            $session_id = $_POST['buy'];

            $sessionModel = new SessionModel();
            $result_buy = $sessionModel->addTicket($session_id);

            if($result_buy['result']){
                $this->redirect('/user/profile');
            }

            $this->render('add_ticket', [
                'sidebar' => UserOperation::getMenuLink(),
                'session' => $session_id
            ]);
        }
    }

}
