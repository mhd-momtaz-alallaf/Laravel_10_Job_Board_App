<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior']; // static array
    public static array $category = [
        'IT',
        'Finance',
        'Sales',
        'Marketing'
    ];
    
    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) { // $search will use the $filters['search'] value
            $query->where(function ($query) use ($search) { // we used function inside a function to make the results of the serach query have (and) operator with the salary queries
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {// $minSalary will use the $filters['min_salary'] value
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {// $maxSalary will use the $filters['max_salary'] value
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {// $experience will use the $filters['experience'] value
            $query->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {// $category will use the $filters['category'] value
            $query->where('category', $category);
        });
    }
}
