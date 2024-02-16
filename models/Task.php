<?php
namespace app\models;

use app\core\DbModel;

class Task extends DbModel {
    
    public string $title;
    public string $description;
    public string $startDate;
    public string $endDate;
    public int $status;

    public function tableName(): string
    {
        return 'tasks';
    }

  
   
}