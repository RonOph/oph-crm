<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $categories = [
        				['name'=>'Search Engine Optimization','code'=>'SEO','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Pay-per-click Advertising','code'=>'PPC','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'SMS Blasting','code'=>'SMS','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Email Marketing','code'=>'EMA','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Marketing Consultation','code'=>'MAR','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Graphic Design','code'=>'GRA','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Social Media','code'=>'SOC','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Ecommerce Website','code'=>'ECO','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Website Development','code'=>'WED','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Web System','code'=>'WES','created_at'=>date('Y-m-d H:i:s')],
        				['name'=>'Mobile Application','code'=>'MOB','created_at'=>date('Y-m-d H:i:s')],
        			];
        DB::table('categories')->insert($categories);

    }
}
