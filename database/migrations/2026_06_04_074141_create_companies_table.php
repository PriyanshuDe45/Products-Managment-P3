<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('telephone');
            $table->string('email');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
