<?php

namespace app\models;

use app\core\BaseModel;

class MainModel extends BaseModel
{
    public function getListSeans()
    {
        $result = 0;
        $seans = $this->select("SELECT * FROM news");

        if(!empty($news)){
            $result = $seans;
        }

        return $result;
    }

}