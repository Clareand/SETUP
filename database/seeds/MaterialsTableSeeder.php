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
            5 => 
            array (
                'id' => 6,
                'title' => 'Setup for Unity',
                'material_text' => '<h1>Unity Game Engine</h1><p>	Vestibulum dapibus tincidunt nisl, ac iaculis lorem eleifend laoreet. Donec et tortor lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet dictum turpis. Vivamus at tellus enim. Nulla facilisi. Vestibulum cursus metus ante, et consectetur odio ultricies quis. Aliquam eu elementum mi. Etiam vel rutrum risus. Quisque vel pulvinar velit. Fusce accumsan sagittis tortor, in finibus ante mollis vitae. Integer commodo convallis nisi, in molestie quam accumsan id. In ultricies porttitor elit, vitae aliquet ligula aliquam pellentesque. Mauris posuere pharetra sem, eu bibendum leo aliquet non.</p><p>More :</p><ul><li>Unity Learn</li><li>Assets Store</li><li>Documentation</li></ul><p>	Donec laoreet arcu vitae diam sodales tincidunt. Duis eu vehicula tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed augue ut odio cursus eleifend non sed mi. Vivamus auctor vehicula sapien non posuere. Curabitur dapibus lectus at libero ornare sollicitudin. Nullam eget rhoncus tortor. Nam euismod justo quis diam semper laoreet. Vestibulum facilisis et augue id sagittis. Sed nec bibendum leo. Etiam pellentesque elit et convallis aliquam.</p><p>	Praesent pellentesque, massa nec fermentum luctus, tortor arcu pharetra purus, non ullamcorper eros risus sed arcu. Nulla consectetur massa nec nisi commodo faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum nec mollis massa. Maecenas sed dolor ac sapien consequat volutpat tristique non ex. Nam sed enim at nisl viverra porta. Donec nec ornare eros.</p><p><br></p><p><br></p><p><br></p>',
                'material_image' => 'public/material/1621395665.jpg',
                'created_at' => '2021-05-19 03:35:55',
                'updated_at' => '2021-05-19 03:41:05',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Unity Scripting',
            'material_text' => '<h1>C#, The Language</h1><p>A script must be attached to a GameObject in the scene in order to be called by Unity. Scripts are written in a special language that Unity can understand. And, it’s through this language that we can talk to the engine and give it our instructions.</p><p>The language that’s used in Unity is called C# (pronounced C-sharp). All the languages that Unity operates with are object-oriented scripting languages. Like any language, scripting languages have syntax, or parts of speech, and the primary parts are called variables, functions, and classes.</p><p>If you’re using a version of Unity until 2017.3, you’ll notice that it has a text editor called MonoDevelop: it can help us complete our code, it’ll let us know if we’re writing a wrong piece of code, and allows us to take shortcuts. Starting with 2018.1, you can also use&nbsp;Visual Studio for Unity Community, or other text editors such as Visual Studio, Notepad, or Sublime text.</p><p><br></p><h2>What do these do?</h2><ul><li>Variables&nbsp;hold values and references to objects (you can see objects as “bigger” variables). They’re like a box that holds something for us to use. Variables start with a lowercase letter.</li><li>Functions&nbsp;are collections of code that compare and manipulate these variables. Functions start with an uppercase letter. We organise code in functions so that they can be easily reused multiple times in different parts of the program.</li><li>Classes&nbsp;are a way to structure code to wrap collections of variables and functions together to create a template that defines the properties of an object.</li></ul>',
                'material_image' => 'public/material/1621395750.png',
                'created_at' => '2021-05-19 03:39:57',
                'updated_at' => '2021-05-19 03:42:30',
            ),
        ));
        
        
    }
}