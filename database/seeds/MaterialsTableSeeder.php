<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('materials')->delete();
        
        \DB::table('materials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Intro to Java',
                'material_text' => '<h2>Java adalah bahasa pemograman</h2><p>biasa digunakan untuk</p><ul><li>mobile</li></ul><p><br></p>',
                'material_image' => 'public/material/1619589999.jpg',
                'created_at' => '2021-04-28 06:06:39',
                'updated_at' => '2021-04-28 06:06:39',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Solid Principle',
                'material_text' => '<h1>Hello, Welcome</h1><p>for this lesson, this will consist of</p><ul><li>intro</li><li>more</li><li>task</li></ul><p>please take attention to this, or it will loose </p><p><br></p>',
                'material_image' => 'public/material/1620050784.jpg',
                'created_at' => '2021-05-03 14:06:24',
                'updated_at' => '2021-05-03 14:06:24',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Intro to phyton',
                'material_text' => '<h1>Lorem Ipsum</h1><p class="ql-align-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mattis est a laoreet imperdiet. Praesent ut massa sodales, convallis nibh ac, pretium odio. Pellentesque arcu lectus, commodo id malesuada eu, dignissim eget justo. Praesent finibus dolor lorem, vel auctor sem tempor et. Proin molestie augue a diam hendrerit rutrum. In hac habitasse platea dictumst. Nunc laoreet, metus vel mollis faucibus, eros justo pellentesque nulla, sit amet elementum augue dui et massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla varius risus nisi. Nunc a ultrices enim. Phasellus nec magna in lectus lacinia tempor non vel ex.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify">Praesent accumsan bibendum mauris, non tristique lorem posuere vel. Sed mattis volutpat porta. Aliquam in luctus urna. Quisque eu nisi eleifend, varius lacus eu, maximus neque. Fusce laoreet eu lectus non tincidunt. Nullam ac vestibulum libero, non pharetra orci. Sed facilisis semper ultricies.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify">Curabitur et tincidunt ipsum, vitae semper nunc. Nam risus lectus, lobortis nec velit eu, rutrum imperdiet massa. Sed semper viverra sapien, quis blandit augue suscipit eu. Duis mollis laoreet est, id accumsan erat euismod nec. Nunc nisi erat, laoreet vitae massa in, lobortis imperdiet purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec id posuere orci.</p><p><br></p>',
                'material_image' => 'public/material/1620196625.eps',
                'created_at' => '2021-05-05 06:37:05',
                'updated_at' => '2021-05-05 06:37:05',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Things need to know in C# Language',
                'material_text' => '<h1>Lorem Ipsum C#</h1><p class="ql-align-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mattis est a laoreet imperdiet. Praesent ut massa sodales, convallis nibh ac, pretium odio. Pellentesque arcu lectus, commodo id malesuada eu, dignissim eget justo. Praesent finibus dolor lorem, vel auctor sem tempor et. Proin molestie augue a diam hendrerit rutrum. In hac habitasse platea dictumst. Nunc laoreet, metus vel mollis faucibus, eros justo pellentesque nulla, sit amet elementum augue dui et massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla varius risus nisi. Nunc a ultrices enim. Phasellus nec magna in lectus lacinia tempor non vel ex.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify">Praesent accumsan bibendum mauris, non tristique lorem posuere vel. Sed mattis volutpat porta. Aliquam in luctus urna. Quisque eu nisi eleifend, varius lacus eu, maximus neque. Fusce laoreet eu lectus non tincidunt. Nullam ac vestibulum libero, non pharetra orci. Sed facilisis semper ultricies.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify">Curabitur et tincidunt ipsum, vitae semper nunc. Nam risus lectus, lobortis nec velit eu, rutrum imperdiet massa. Sed semper viverra sapien, quis blandit augue suscipit eu. Duis mollis laoreet est, id accumsan erat euismod nec. Nunc nisi erat, laoreet vitae massa in, lobortis imperdiet purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec id posuere orci.</p><p><br></p>',
                'material_image' => 'public/material/1620196698.eps',
                'created_at' => '2021-05-05 06:38:18',
                'updated_at' => '2021-05-05 06:38:18',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Things need to now in web development',
                'material_text' => '<h1>Lorem Ipsum</h1><p class="ql-align-justify">Curabitur et tincidunt ipsum, vitae semper nunc. Nam risus lectus, lobortis nec velit eu, rutrum imperdiet massa. Sed semper viverra sapien, quis blandit augue suscipit eu. Duis mollis laoreet est, id accumsan erat euismod nec. Nunc nisi erat, laoreet vitae massa in, lobortis imperdiet purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec id posuere orci.</p><p class="ql-align-justify">Aliquam eu mi non risus ullamcorper bibendum. Proin imperdiet eros in elit venenatis porta. Donec eu risus blandit enim elementum efficitur. Maecenas quis bibendum elit. Nullam sit amet nisi tincidunt turpis consectetur finibus et et nulla. Aenean at elementum justo. Mauris id orci vitae lorem porttitor lobortis volutpat vitae dui. </p><p class="ql-align-justify"><br></p><p class="ql-align-justify">Nullam ullamcorper commodo velit sed mollis. In vel sapien at sem aliquam imperdiet. Donec et ex nisi. Duis accumsan est a libero gravida, id auctor dolor vestibulum. Morbi dui leo, finibus sit amet tristique euismod, lacinia vel lacus. Nulla tempor malesuada turpis, nec porta nisl eleifend mattis. Suspendisse potenti. Phasellus mattis enim quis erat lacinia posuere. Nullam at faucibus lacus.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify">Pellentesque ipsum est, fermentum ut porta a, porta ac erat. Nam ante mauris, rhoncus eu aliquet nec, ultrices ut augue. Nulla sed mauris libero. Nam accumsan urna diam, id iaculis velit vestibulum vehicula. Sed posuere nibh magna, eu blandit nisl varius eget. In hac habitasse platea dictumst. Fusce vitae vehicula eros, viverra facilisis tortor. Vestibulum scelerisque tempor viverra. Cras volutpat sem massa, eu tristique diam suscipit sed. Sed in sem et massa pellentesque efficitur et eu purus.</p><p><br></p>',
                'material_image' => 'public/material/1620197445.eps',
                'created_at' => '2021-05-05 06:50:45',
                'updated_at' => '2021-05-05 06:50:45',
            ),
        ));
        
        
    }
}