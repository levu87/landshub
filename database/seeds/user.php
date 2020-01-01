<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'name' => 'quocsuu',
                'email' => 'quocsuu66@gmail.com',
                'phone'=>'0937718467',
                'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
                'plain_password'=> '123456',
                'role'=>0,
                'email_verified_at'=> '2019-10-27 17:31:55',
                'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
                'password' => bcrypt('123456'),
            ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand().'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
            // array(
            //     'name' => 'quocsuu',
            //     'email' => 'quocsuu'.rand(0,40).'66@gmail.com',
            //     'phone'=>'0937718467',
            //     'avt'=>'uploads/dm/img-'.rand(0,40).'.jpg',
            //     'plain_password'=> '123456',
            //     'role'=>1,
            //     'email_verified_at'=> '2019-10-27 17:31:55',
            //     'tom_tat'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ex, numquam iste soluta molestiae consequatur voluptates harum accusantium, sit pariatur facere tenetur accusamus optio fugit corrupti ea eum eligendi enim! ',
            //     'password' => bcrypt('123456'),
            // ),
        );
        DB::table('users')->insert($data);
    }
}
