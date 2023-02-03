<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('address')->nullable();
            $table->string('description');
            $table->string('notes')->nullable();
            $table->string('work_performed')->nullable();
            $table->boolean('priority')->default(0);
            $table->boolean('water')->default(0)->nullable();
            $table->boolean('gas')->default(0)->nullable();
            $table->boolean('sewer')->default(0)->nullable();
            $table->boolean('street')->default(0)->nullable();
            $table->boolean('complete')->default(0)->nullable();
            $table->boolean('yard_repair')->default(0)->nullable();
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
        Schema::dropIfExists('work_orders');
    }
};
