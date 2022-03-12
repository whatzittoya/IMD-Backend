<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoleHasPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->foreign(['role_id'], 'for_role_id')->references(['id'])->on('roles')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['permission_id'], 'rhp_for_permission_id')->references(['id'])->on('permissions')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropForeign('for_role_id');
            $table->dropForeign('rhp_for_permission_id');
        });
    }
}
