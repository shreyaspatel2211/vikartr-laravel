<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPemissionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $permissions = [
                ['name' => 'view message template', 'guard_name' => 'web'],
                ['name' => 'create message template', 'guard_name' => 'web'],
                ['name' => 'update message template', 'guard_name' => 'web'],
                ['name' => 'delete message template', 'guard_name' => 'web'],
                ['name' => 'view email template', 'guard_name' => 'web'],
                ['name' => 'create email template', 'guard_name' => 'web'],
                ['name' => 'update email template', 'guard_name' => 'web'],
                ['name' => 'delete email template', 'guard_name' => 'web'],
            ];
    
            foreach ($permissions as $permission) {
                DB::table('permissions')->insert($permission);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
             // Remove permissions
        $permissionNames = [
            'view message template',
            'create message template',
            'update message template',
            'delete message template',
            'view email template',
            'create email template',
            'update email template',
            'delete email template',
        ];

        DB::table('permissions')->whereIn('name', $permissionNames)->delete();
        });
    }
}
