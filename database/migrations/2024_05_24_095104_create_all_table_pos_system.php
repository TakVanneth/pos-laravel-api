<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        /*
        // Create Categories Table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create Suppliers Table
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // Create Products Table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('image_url');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->decimal('unit_price', 10, 2);
            $table->integer('stock_quantity');
            $table->timestamps();
        });

        // // Create Customers Table
        // Schema::create('customers', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('customer_name');
        //     $table->string('contact_email')->nullable();
        //     $table->string('contact_phone')->nullable();
        //     $table->text('address')->nullable();
        //     $table->timestamps();
        // });

        // Create Sales Table
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamp('sale_date')->useCurrent();
            $table->foreignId('customer_id')->constrained('customers');
            $table->decimal('total_amount', 10, 2);
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        // Create Sale Items Table
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('sales');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });

        // Create Stock Management Table
        Schema::create('stock_management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity_change');
            $table->enum('operation', ['addition', 'subtraction']);
            $table->timestamp('operation_date')->useCurrent();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        // Create Purchases Table
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamp('purchase_date')->useCurrent();
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->decimal('total_amount', 10, 2);
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        // Create Purchase Items Table
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    */
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    /*
        Schema::dropIfExists('purchase_items');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('stock_management');
        Schema::dropIfExists('sale_items');
        Schema::dropIfExists('sales');
        // Schema::dropIfExists('customers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('categories');
    */
    }
};
