<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmiDetailRepository 
{
    public function all()
    {
        if (Schema::hasTable('emi_details')) {
            return DB::table('emi_details')->get();
        } else {
            return collect();
        }
    }

    public function create(array $data)
    {
        if (Schema::hasTable('emi_details')) {
            return DB::table('emi_details')->insert($data);
        }
        return false;
    }

    public function deleteAll()
    {
        if (Schema::hasTable('emi_details')) {
            return DB::statement('DROP TABLE emi_details');
        }
        return false;
    }
}
