<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    function employees()
    {
        return $this->hasMany(Employee::class);
    }
    function getDomainAttribute()
    {
        $url = $this->attributes['website'];
        $matches = ['domain'];
        preg_match('/(?!w{1,}\.)(\w+\.?)([a-zA-Z]+)(\.\w+)/', $url, $matches);
        return $matches[0];
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(
            function ($company) {
                $company->employees()->each(
                    function ($employee) {
                        $employee->delete();
                    }
                );
            }
        );
    }
}
