<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    //
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'label-danger'],
        2 => ['label' => '着手中', 'class' => 'label-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];

    public function getStatusAttribute()
    {
        $status = $this->attributes['status'];

        // if (!isset(self::STATUS[$status])) {
        //     return '';
        // }

        return self::STATUS[$status]['label'];
    }
    
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        // if (!isset(self::STATUS[$status]['label']))
        // {
        //     return '';
        // }
        return self::STATUS[$status]['class'];

    }
    
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
        ->format('Y/m/d');
    }

}
