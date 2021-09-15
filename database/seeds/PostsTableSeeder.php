<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            $newPost = new Post();

            $newPost->title = 'post id: #' . ($i + 1);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus quis turpis vitae molestie. Donec commodo a ante eu rhoncus. Suspendisse pellentesque a sem gravida pellentesque. Duis nec pretium augue, eu viverra dolor. Duis elementum nisi maximus faucibus consequat. Nullam euismod felis vitae turpis condimentum, id maximus elit luctus. Sed tempus urna sem, eu mollis metus hendrerit in. In consectetur vitae ipsum id scelerisque. Pellentesque ultrices augue eget felis tempus, malesuada aliquam mauris aliquam. Quisque dapibus imperdiet nunc, et mollis ante porta sodales. Morbi ullamcorper ut odio non dapibus. Nam imperdiet, purus condimentum vestibulum pulvinar, ipsum neque fringilla nisl, vitae sollicitudin magna nisi id enim. Pellentesque quis orci at augue blandit dapibus eget id augue. ';

            $newPost->save();
        }
    }
}
