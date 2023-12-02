<?php

namespace app\models;

use app\core\BaseModel;

class SessionModel extends BaseModel
{
    public function add($session_data)
    {
        $result = false;
        $error_message = '';

        if(empty($session_data['title'])){
            $error_message .= 'придумай название ленивая жопа<br>';
        }

        if(empty($session_data['date'])){
            $error_message .= 'ты забыл написать краткое описание или спецом его пропустил? <br>';
        }

        if(empty($session_data['genre'])){
            $error_message .= 'далеко без описания собрался?<br>';
        }

        if(empty($error_message)){
            $result = $this->insert("INSERT INTO sessions (title, genre, date) 
                VALUES (:title, :genre, :date)", 
                [
                    'title' => $session_data['title'],
                    'genre' => $session_data['genre'],
                    'date' => $session_data['date'],
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

    public function edit($id, $session_data)
    {
        $result = false;
        $error_message = '';

        if(empty($id)){
            $error_message .= 'нет такого id<br>';
        }
        if(empty($session_data['title'])){
            $error_message .= 'заголовок забыл, гений';
        }
        if(empty($session_data['genre'])){
            $error_message .= 'краткое описание забыл, гений';
        }
        if(empty($session_data['date'])){
            $error_message .= 'описание забыл, гений';
        }

        if(empty($error_message)){
            $result = $this->update(
                "UPDATE sessions SET title = :title, 
                genre = :genre, description = :description, date = :date
                WHERE id = :id",
                [
                    'title' => $session_data['title'],
                    'genre' => $session_data['genre'],
                    'date' => $session_data['date'],
                    'id' => $id
                ]
            );
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