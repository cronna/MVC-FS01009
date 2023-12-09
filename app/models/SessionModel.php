<?php

namespace app\models;

use app\core\BaseModel;
use ReturnTypeWillChange;

class SessionModel extends BaseModel
{
    public function add($session_data, $img)
    {
        $result = false;
        $error_message = '';
        $img = base64_encode($img);

        if(empty($session_data['title'])){
            $error_message .= 'придумай название ленивая жопа<br>';
        }

        if(empty($session_data['date'])){
            $error_message .= 'ты забыл написать краткое описание или спецом его пропустил? <br>';
        }
        if(empty($error_message)){
            $result = $this->insert("INSERT INTO sessions (title, s_desc, session_date, start_time, img) 
                VALUES (:title, :s_desc, :session_date, :start_time, :img)", 
                [
                    'title' => $session_data['title'],
                    's_desc' => $session_data['desc'],
                    'session_date' => $session_data['date'],
                    'start_time' => $session_data['start_time'],
                    'img' => $img
                ]
            );

        }

        

        return [
            'result' => $result,
            'error_message' => $error_message
        ];
    }

    public function getListSession()
    {
        $result = 0;
        $session = $this->select("SELECT * FROM sessions");

        if(!empty($session)){
            $result = $session;
        }

        return $result;
    }

    public function getEndSession(){
        $end_session = $this->select("SELECT id FROM sessions ORDER BY id DESC");

        return $end_session;
    }

    public function getSessionById($id)
    {
        $result = null;
        $session = $this->select("SELECT * FROM sessions WHERE id = :id", [
            'id' => $id
        ]);

        if(!empty($session[0])){
            $result = $session[0];
        }

        return $result;
    }

    public function edit($id, $session_data, $img)
    {
        $result = false;
        $error_message = '';
        
        

        if(empty($id)){
            $error_message .= 'нет такого id<br>';
        }
        if(empty($session_data['title'])){
            $error_message .= 'заголовок забыл, гений';
        }
        if(empty($session_data['date'])){
            $error_message .= 'описание забыл, гений';
        }

        if(empty($error_message)){
            if($img != null){
                $img = base64_encode($img);
                $result = $this->update(
                    "UPDATE sessions SET title = :title, session_date = :session_date, s_desc = :s_desc, start_time = :start_time, img = :img
                    WHERE id = :id",
                    [
                        'title' => $session_data['title'],
                        'session_date' => $session_data['date'],
                        's_desc' => $session_data['desc'],
                        'start_time' => $session_data['start_time'],
                        'img' => $img,
                        'id' => $id
                    ]
                );
            }else{
                $result = $this->update(
                    "UPDATE sessions SET title = :title, session_date = :session_date, s_desc = :s_desc, start_time = :start_time
                    WHERE id = :id",
                    [
                        'title' => $session_data['title'],
                        'session_date' => $session_data['date'],
                        's_desc' => $session_data['desc'],
                        'start_time' => $session_data['start_time'],
                        'id' => $id
                    ]
                );
            }
        }

        return [
            'result' => $result,
            'error_message' => $error_message
        ];

    }
    public function deleteById($id)
    {
        $result = false;
        $error_message = '';

        if(empty($id)){
            $error_message .= 'нет такого id<br>';
        }

        if(empty($error_message)){
            $result = $this->delete("DELETE FROM sessions WHERE id = :id", 
            [
                'id' => $id
            ]);
        }

        return [
            'result' => $result,
            'error_message' => $error_message
        ];
    }
}