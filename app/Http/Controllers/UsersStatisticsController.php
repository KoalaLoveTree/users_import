<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Collection;

class UsersStatisticsController extends Controller
{
    public function index()
    {
        /** @var Collection $users */
        $users = User::get();
        return [
            'count_of_users' => $users->count(),
            'count_by_gender' => $users->countBy(function ($item){
                return $item->gender;
            }),
            'avg_age' => $users->avg(function ($item){
                return $item->age;
            }),
            'avg_male_age' => $users->avg(function ($item){
                if ($item->gender === 'Male'){
                    return $item->age;
                }
            }),
            'avg_female_age' => $users->avg(function ($item){
                if ($item->gender === 'Female'){
                    return $item->age;
                }
            }),
            'users_by_country' => $users->countBy(function ($item){
                return $item->country;
            }),
        ];
    }
}
