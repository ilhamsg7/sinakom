<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model {
    use HasFactory;

    protected $table = 'memberships';
    protected $guarded = ['id'];
    protected $with = ['courseList', 'user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function courseList() {
        return $this->belongsTo(CourseList::class);
    }
}
