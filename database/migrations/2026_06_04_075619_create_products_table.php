<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('name_en',200);
            $table->string('name_fr',200);
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            $table->string('brand',50)->nullable();
            $table->string('country_of_origin')->nullable();
            $table->decimal('gross_weight', 8, 3)->nullable();
            $table->decimal('net_weight', 8, 3)->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('gtin')->unique();
            $table->string('image_path')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
