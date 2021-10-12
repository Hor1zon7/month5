<?php

use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('zh_CN');
        $data=[];
        for ($i=0;$i<10;$i++){
            $data[]=[
                'name'=>$faker->lastName,
                'phone'=>$faker->phoneNumber,
                'deg'=>'全栈学院',
                'score'=>rand(0,100),
            ];
        }
        \DB::table('student')->insert($data);
    }
}
