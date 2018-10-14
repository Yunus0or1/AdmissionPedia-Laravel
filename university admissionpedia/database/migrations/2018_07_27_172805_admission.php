<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('news', function (Blueprint $table) {

			$table->string('headline');

            $table->engine = 'InnoDB';
        });
		
		
		
		Schema::create('universities', function (Blueprint $table) {
            $table->increments('univ_id');
			$table->string('univ_full_name');
			$table->string('univ_short_name');
			$table->integer('total_seat');
			$table->integer('total_unit');
			$table->string('unit_description');
			$table->integer('total_science_unit');
			$table->integer('total_commerce_unit');
			$table->integer('total_all_allowed_unit');
			$table->date('apply_start');
			$table->date('apply_off');
			$table->double('req_gpa_ssc')->default('0');
			$table->double('req_gpa_hsc')->default('0');
			$table->double('req_gpa_total')->default('0');
			$table->double('req_gpa_pcmeb')->default('0');
			$table->integer('allow_second_timer');
			$table->integer('deduction');
			$table->string('prospectus_based_on_year');
			$table->string('prospectus_link')->nullable();		
			$table->string('website');
			$table->string('gre_score')->default('10000');
			
			
            $table->engine = 'InnoDB';
        });
		
		
		Schema::create('all_nctb_curriculum_units', function (Blueprint $table) {
            $table->increments('unit_id');
			$table->integer('univ_id');
			$table->string('unit_name');
			$table->string('unit_belongs_to');
			$table->integer('total_seat')->default('0');
			$table->date('exam_date')->default('0000-00-0');
			$table->string('day')->default('0');
			$table->string('exact_time')->default('0');
			$table->string('system_of_apply')->default('0');
			$table->integer('form_price')->default('0');
			$table->double('req_gpa_ssc')->default('0');
			$table->double('req_gpa_hsc')->default('0');
			$table->double('req_gpa_total')->default('0');
			$table->double('req_gpa_bangla')->default('0');
			$table->double('req_gpa_english')->default('0');
			$table->double('req_gpa_math')->default('0');
			$table->double('req_gpa_physics')->default('0');
			$table->double('req_gpa_chem')->default('0');
			$table->double('req_gpa_biology')->default('0');
			$table->double('req_gpa_business_management')->default('0');
			$table->double('req_gpa_accounting')->default('0');
			$table->double('req_gpa_finance')->default('0');
			$table->double('req_gpa_marketing')->default('0');
			$table->double('req_gpa_economics')->default('0');			
			$table->integer('req_biology_agri_as_a_subject')->default('0'); //This is for those units who require biology or agri
			$table->integer('req_math_as_a_subject')->default('0');
			
            $table->engine = 'InnoDB';
        });


		Schema::create('all_depts', function (Blueprint $table) {
            $table->increments('dept_id');
			$table->string('dept_name');
			$table->integer('unit_id');
			$table->string('dept_belongs_to');		
			$table->integer('total_seat')->default('0');
			$table->double('req_gpa_ssc')->default('0');
			$table->double('req_gpa_hsc')->default('0');
			$table->double('req_gpa_total')->default('0');
			$table->double('req_gpa_bangla')->default('0');
			$table->double('req_gpa_english')->default('0');
			$table->double('req_gpa_math')->default('0');
			$table->double('req_gpa_physics')->default('0');
			$table->double('req_gpa_chem')->default('0');
			$table->double('req_gpa_biology')->default('0');
			$table->double('req_gpa_business_management')->default('0');
			$table->double('req_gpa_accounting')->default('0');
			$table->double('req_gpa_finance')->default('0');
			$table->double('req_gpa_marketing')->default('0');
			$table->double('req_gpa_economics')->default('0');			
			
            $table->engine = 'InnoDB';
        });

		
		Schema::create('science_student', function (Blueprint $table) {
            $table->integer('student_id')->primary();
			$table->double('gpa_ssc')->default('0');
			$table->double('gpa_hsc')->default('0');
			$table->double('gpa_total')->default('0');
			$table->double('gpa_bangla')->default('0');
			$table->double('gpa_english')->default('0');
			$table->double('gpa_math')->default('0');
			$table->double('gpa_physics')->default('0');
			$table->double('gpa_chem')->default('0');
			$table->double('gpa_biology')->default('0');
			$table->double('gpa_agri')->default('0');
			
            $table->engine = 'InnoDB';
        });		

    }


    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('news');
		Schema::dropIfExists('universities');
		Schema::dropIfExists('all_nctb_curriculum_units');
		Schema::dropIfExists('all_depts');
		Schema::dropIfExists('science_student');
    }
}
