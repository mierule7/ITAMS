<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFactorColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('google2fa_secret')  // This is the TEXT column for the secret
                  ->nullable()                // Allows NULL values initially
                  ->after('password');        // Optional: places after password column

            $table->boolean('two_factor_enabled')
                  ->default(false)           // Defaults to false (2FA disabled)
                  ->after('google2fa_secret');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['google2fa_secret', 'two_factor_enabled']);
        });
    }
}
