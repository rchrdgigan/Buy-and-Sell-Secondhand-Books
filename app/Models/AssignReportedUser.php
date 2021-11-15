<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignReportedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_info_id',
        'user_id',
        'reported_by_id',
        'date_of_blocked',
        'date_of_unblocked',
        'status',
    ];

}
