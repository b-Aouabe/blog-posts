<?php

namespace Database\Seeders;
use \App\Models\User;
use App\Models\category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        // $cat = Category::factory()->create([
        //     'name' => "in"
        // ]);

        Post::factory(10)->create();

        // //craeting one user
        // $users = User::factory(2)->create();

        // //creating 3 categories
        // $work = Category::create([
        //     'name' => 'my-work-category',
        //     'slug' => 'work',
        // ]);

        // $family = Category::create([
        //     'name' => 'my-family-category',
        //     'slug' => 'family',
        // ]);

        // $health = Category::create([
        //     'name' => 'my-health-category',
        //     'slug' => 'health',
        // ]);


        // // creating posts:
        // Post::create([
        //     'user_id' => $users[0]->id,
        //     'category_id' => $family->id,
        //     'slug' => "first-post",
        //     'title' => "How to talk about anything to your spouse",
        //     'excerpt' => "<p>When you’re married to a partner who finds it difficult to open up and communicate with you...</p>",
        //     'body' => "<p>When you’re married to a partner who finds it difficult to open up and communicate with you, you have to get creative. Verbally expressing what you’re feeling, what you need, and what matters most to you, doesn’t come naturally for everyone. So, while you can’t force your spouse to open up and talk to you about anything, you can encourage them by introducing activities and a safe space that makes it easier for them to share. In this post, we will explore five great conversation starters for married couples, to help you better understand how to talk to your spouse about anything.</p>",
        //     'published_at' => now()

        // ]);

        // Post::create([
        //     'user_id' => $users[1]->id,
        //     'category_id' => $family->id,
        //     'slug' => "second-post",
        //     'title' => "Dating advices",
        //     'excerpt' => "<p>As a Certified Relationship Coach, I easily get caught up in reality TV when the focus is on love...</p>",
        //     'body' => "<p>As a Certified Relationship Coach, I easily get caught up in reality TV when the focus is on love, dating, and marriage. Lessons learned from dating shows are actually helpful to those who care about love and how they show up in their relationship. You can often learn what not to do. I watch, learn […]</p>",
        //     'published_at' => now()

        // ]);

        // Post::create([
        //     'user_id' => $users[0]->id,
        //     'category_id' => $work->id,
        //     'slug' => "third-post",
        //     'title' => "make your business irresistible to attract candidates",
        //     'excerpt' => "<p>What’s it like to work for your company? Let’s face it, it’s all candidates want to know. And the first place they’ll probably check is social media...</p>",
        //     'body' => "<p>What’s it like to work for your company? Let’s face it, it’s all candidates want to know. And the first place they’ll probably check is social media.   Don’t be afraid to inject a little personality into your social posts to attract candidates. Think team member Q&As, work nights out and employee recognition posts – anything that showcases your company culture and builds a reputation as somewhere people would love to work.   Authenticity is key here. Make sure your employer brand accurately represents your business to draw the right candidates to your roles.  Creating a strong employer brand encourages your team members to be brand ambassadors, too. They’ll be shouting about your job openings on their social media and spreading the word to their friends, helping you attract more candidates.</p>",
        //     'published_at' => now()

        // ]);
    }
}
