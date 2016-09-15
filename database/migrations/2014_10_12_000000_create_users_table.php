<?php

use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('user_type');    // sys_admin, branch_admin, staff
            $table->boolean('active')->default(false);
            $table->integer('branch_id')->unsigned();

            $table->rememberToken();
            $table->timestamps();
        });

        $user = [
            'name' => 'System Administrator',
            'email' => 'rdg577@yahoo.com',
            'password' => \Illuminate\Support\Facades\Hash::make('danger'),
            'user_type' => 'sys_admin',
            'active' => true,
            'branch_id' => 1
        ];

        User::create($user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
