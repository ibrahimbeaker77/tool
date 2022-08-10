<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->text('about')->nullable();
            $table->boolean('twoStepVerification')->default(1);
            $table->boolean('twoStepVerificationStatus')->default(1);
            $table->boolean('emailNotification')->default(1);
            $table->boolean('securityAlert')->default(1);
            $table->boolean('alwaysSignIn')->default(1);
            $table->boolean('status')->default(1);
            $table->boolean('role')->default(2);
            $table->boolean('membership')->default(2);
            $table->string('image')->default('default.png');
            $table->string('apiKey');
            $table->string('apiKeyStatus')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
