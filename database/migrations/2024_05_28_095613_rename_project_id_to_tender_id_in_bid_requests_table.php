<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bid_requests', function (Blueprint $table) {
            // إعادة تسمية الحقل project_id إلى tender_id
            $table->renameColumn('project_id', 'tender_id');

            // حذف القيد الخارجي القديم
            $table->dropForeign(['project_id']);

            // إضافة القيد الخارجي الجديد
            $table->foreign('tender_id')->references('id')->on('tenders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bid_requests', function (Blueprint $table) {
            // إعادة تسمية الحقل tender_id إلى project_id
            $table->renameColumn('tender_id', 'project_id');

            // حذف القيد الخارجي الجديد
            $table->dropForeign(['tender_id']);

            // إعادة إضافة القيد الخارجي القديم
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

};
