<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
                'name' => 'Rizky Albani',
                'username' => 'rzkyalbani',
                'password' => bcrypt('password'),
                'profile_picture' => 'profile-pictures/Zi2KilwrXeSZyPclvVwUAyrxgTHmRrZQRvQNZItl.png'
            ],
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'password' => bcrypt('password'),
                'profile_picture' => 'profile-pictures/Zi2KilwrXeSZyPclvVwUAyrxgTHmRrZQRvQNZItl.png'
            ]
        ]);

        Category::insert([
            [
                'name' => 'Art & Design',
                'slug' => 'art-and-design'
            ],
            [
                'name' => 'Beauty & Fashion',
                'slug' => 'beauty-and-fashion'
            ],
            [
                'name' => 'Business & Finance',
                'slug' => 'business-and-finance'
            ],
            [
                'name' => 'Education & Learning',
                'slug' => 'education-and-learning'
            ],
            [
                'name' => 'Entertainment',
                'slug' => 'entertainment'
            ],
            [
                'name' => 'Food & Cooking',
                'slug' => 'food-and-cooking'
            ],
            [
                'name' => 'Health & Fitness',
                'slug' => 'health-and-fitness'
            ],
            [
                'name' => 'Home & Garden',
                'slug' => 'home-and-garden'
            ],
            [
                'name' => 'News & Current Affairs',
                'slug' => 'news-and-current-affairs'
            ],
            [
                'name' => 'Science & Technology',
                'slug' => 'science-and-technology'
            ],
            [
                'name' => 'Travel & Adventure',
                'slug' => 'travel-and-adventure'
            ],
            [
                'name' => 'Others',
                'slug' => 'others'
            ]            
        ]);

        Post::insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'Judul Satu',
                'slug' => 'judul-satu',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, distinctio quam! Odio commodi, quisquam rem quod ab amet explicabo repudiandae quo ipsa veniam natus sequi quasi iste doloremque eaque consequatur adipisci nisi eos officia perspiciatis sint id tempore? Illum quidem impedit repudiandae explicabo magni cumque. Inventore veritatis amet non voluptate.',
                'image' => 'posts-images/1.webp',
                'total_likes' => 0,
                'created_at' => now()
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'title' => 'Judul Dua',
                'slug' => 'judul-dua',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro rem quia dolore aut reiciendis cumque excepturi dolorem, sint fugiat nisi! Blanditiis assumenda velit minus modi, laboriosam corrupti excepturi soluta officia sapiente vero aliquam aspernatur quidem, hic sed natus ullam corporis magni dolorem quibusdam incidunt maiores optio. Ab distinctio labore corrupti vero voluptatum illo cumque a, laborum porro repellendus itaque dignissimos. Vel in porro voluptatum quaerat ipsa voluptates ex ullam recusandae ratione rem molestiae ut vitae repellendus harum quam, accusamus quos.',
                'image' => 'posts-images/1.webp',
                'total_likes' => 0,
                'created_at' => now()
            ]
        ]);
    }
}
