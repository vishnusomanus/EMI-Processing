<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EmiDetailRepository 
{
    public function all()
    {
        return DB::table('emi_details')->get();
    }

    public function create(array $data)
    {
        return DB::table('emi_details')->insert($data);
    }

    public function deleteAll()
    {
        return DB::statement('DROP TABLE IF EXISTS emi_details');
    }
}

