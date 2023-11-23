<?php

namespace app\models;

use app\core\BaseModel;

class NewsModel extends BaseModel
{
    public function add($news_data)
    {
        $result = false;
        $error_message = '';

        if(empty($news_data['title'])){
            $error_message .= 'придумай название ленивая жопа<br>';
        }

        if(empty($news_data['short_description'])){
            $error_message .= 'ты забыл написать краткое описание или спецом его пропустил? <br>';
        }

        if(empty($news_data['description'])){
            $error_message .= 'далеко без описания собрался?<br>';
        }

        if(empty($error_message)){
            $result = $this->insert("INSERT INTO news (title, short_description, description, date_create, user_id) 
                VALUES (:title, :short_description, :description, NOW(), :user_id)", 
                [
                    'title' => $news_data['title'],
                    'short_description' => $news_data['short_description'],
                    'description' => $news_data['description'],
                    'user_id' => $_SESSION['user']['id']
                ]
            );
        }

        return [
            'result' => $result,
            'error_message' => $error_message
        ];
    }

    public function getListNews()
    {
        $result = 0;
        $news = $this->select("SELECT * FROM news");

        if(!empty($news)){
            $result = $news;
        }

        return $result;
    }
}