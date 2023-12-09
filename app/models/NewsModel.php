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

    public function getListPapers(){
        $result = 0;
        $paper = $this->select("SELECT * FROM papers");

        if(!empty($paper)){
            $result = $paper;
        }

        return $result;
    }

    public function getListChannels(){
        $result = 0;
        $channels = $this->select("SELECT * FROM channels");

        if(!empty($channels)){
            $result = $channels;
        }

        return $result;
    }

    public function getNewsById($id)
    {
        $result = null;
        $news = $this->select("SELECT * FROM news WHERE id = :id", [
            'id' => $id
        ]);

        if(!empty($news[0])){
            $result = $news[0];
        }

        return $result;
    }

    public function getPaperById($id){
        $result = null;
        $paper = $this->select("SELECT * FROM papers WHERE id = :id", [
            'id' => $id
        ]);

        if(!empty($paper[0])){
            $result = $paper[0];
        }

        return $result;
    }

    public function getChannelById($id){
        $result = null;
        $channel = $this->select("SELECT * FROM channels WHERE id = :id", [
            'id' => $id
        ]);

        if(!empty($channel[0])){
            $result = $channel[0];
        }

        return $result;
    }

    public function getChannelContent($id){
        $result = null;
        $channelContent = $this->select("SELECT * FROM posts WHERE channel_id = :id", [
            'id' => $id
        ]);

        if(!empty($channelContent[0])){
            $result = $channelContent[0];
        }

        return $result;
    }

    public function edit($id, $news_data)
    {
        $result = false;
        $error_message = '';

        if(empty($id)){
            $error_message .= 'нет такого id<br>';
        }
        if(empty($news_data['title'])){
            $error_message .= 'заголовок забыл, гений';
        }
        if(empty($news_data['short_description'])){
            $error_message .= 'краткое описание забыл, гений';
        }
        if(empty($news_data['description'])){
            $error_message .= 'описание забыл, гений';
        }

        if(empty($error_message)){
            $result = $this->update(
                "UPDATE news SET title = :title, 
                short_description = :short_description, description = :description
                WHERE id = :id",
                [
                    'title' => $news_data['title'],
                    'short_description' => $news_data['short_description'],
                    'description' => $news_data['description'],
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
            $result = $this->delete("DELETE FROM news WHERE id = :id", 
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