<?php

use Illuminate\Database\Seeder;

class LearningPathsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('learning_paths')->delete();
        
        \DB::table('learning_paths')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_badge' => 1,
                'id_field_of_tech' => 1,
                'name' => 'Front-End Web Developer',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id tellus id elit pretium bibendum. Morbi ornare est nisi, ut cursus orci suscipit ut. Maecenas vitae augue aliquam, cursus ipsum non, pulvinar lorem. Aliquam erat volutpat. Aenean urna enim, aliquet quis justo ac, dignissim ultrices velit. Donec non auctor arcu, a efficitur justo. Duis finibus nunc odio, eget aliquam tellus ultrices sit amet. In iaculis mi eu ligula finibus semper.',
                'created_at' => '2021-04-07 13:32:36',
                'updated_at' => '2021-04-07 13:32:36',
            ),
            1 => 
            array (
                'id' => 2,
                'id_badge' => 2,
                'id_field_of_tech' => 1,
                'name' => 'Back-End Web Developer',
                'description' => 'Vivamus tellus leo, dignissim a velit sit amet, elementum molestie mi. Ut euismod ex a justo viverra, at imperdiet dui viverra. Sed quis dolor at massa condimentum ultrices. Donec elementum ultrices fermentum. Nullam viverra dolor et est laoreet congue. Vestibulum faucibus nisl et ex dignissim consequat. Mauris sit amet quam eros. Nullam eu neque a risus luctus malesuada. Donec enim risus, volutpat et pretium sed, semper nec tortor. Quisque turpis enim, laoreet vel elit eget, facilisis lobortis arcu.',
                'created_at' => '2021-04-07 13:32:36',
                'updated_at' => '2021-04-07 13:32:36',
            ),
            2 => 
            array (
                'id' => 3,
                'id_badge' => 4,
                'id_field_of_tech' => 4,
                'name' => 'UI Designer',
                'description' => 'Sed semper vestibulum ultricies. Etiam a gravida purus. Cras ullamcorper sem ac lorem finibus, vel iaculis mauris accumsan. Nam feugiat aliquam orci at ornare. Sed volutpat eros purus, at eleifend risus suscipit sit amet. Fusce eleifend ligula facilisis nisl maximus tempor. Sed eleifend felis purus, rutrum tempor eros imperdiet non. Proin sagittis est magna. Etiam in fringilla elit.',
                'created_at' => '2021-04-07 13:36:50',
                'updated_at' => '2021-04-07 13:36:50',
            ),
            3 => 
            array (
                'id' => 4,
                'id_badge' => 3,
                'id_field_of_tech' => 2,
                'name' => 'Android Developer',
                'description' => 'Vestibulum vel lacus tristique, pulvinar ante vel, rutrum nibh. Etiam est sem, malesuada in hendrerit vitae, convallis at arcu. Integer tempus ligula dui, quis posuere velit cursus quis. Suspendisse id accumsan arcu. Curabitur vel dignissim ipsum. Nullam rutrum erat vitae metus aliquet malesuada. Nam ultrices varius mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus facilisis tellus eu congue dapibus. Aliquam vel maximus tortor, vitae pharetra magna. Pellentesque feugiat ligula sem, ac lobortis purus eleifend in. In tristique neque suscipit ligula mollis sodales.',
                'created_at' => '2021-04-07 13:36:50',
                'updated_at' => '2021-04-07 13:36:50',
            ),
        ));
        
        
    }
}