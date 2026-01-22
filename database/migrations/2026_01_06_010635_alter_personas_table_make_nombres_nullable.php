<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para hacer nullable la columna 'nombres' en tabla personas
 *
 * Razón: Para proveedores/clientes con tipo de documento RUC (empresas),
 * no se requiere nombres personales ya que usan razon_social.
 * Solo las personas naturales (DNI, CE, PASAPORTE) necesitan nombres.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'sqlite') {
        Schema::table('personas', function (Blueprint $table) {
            $table->string('nombres')->nullable()->change();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'sqlite') {
        Schema::table('personas', function (Blueprint $table) {
            $table->string('nombres')->nullable(false)->change();
        });
    }
    }
};
