<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {

        $featuredPosts = [
            [
                'id' => 1,
                'thumbnail_path' => '',
                'category' => [
                    'title' => "Web Development",
                    'slug' => "web-development",
                ],
                'author' => [
                    'name' => "Mr. Supper Cool Man"
                ],
                'title' => "The Future of Web Development in 2023",
                'content' => "Explore the latest trends and technologies shaping the future of web development this year.",
                'created_at' => Carbon::parse('2023-05-15 00:00:00'),
                'reading_duration' => 5,
            ],
            [
                'id' => 2,
                'thumbnail_path' => '',
                'category' => [
                    'title' => "Artificial Intelligence",
                    'slug' => "artificial-intelligence",
                ],
                'author' => [
                    'name' => "Ms. Neural Net"
                ],
                'title' => "Getting Started with AI and Machine Learning",
                'content' => "A beginner's guide to understanding and implementing AI and machine learning concepts.",
                'created_at' => Carbon::parse('2023-06-02 00:00:00'),
                'reading_duration' => 8,
            ],
            [
                'id' => 3,
                'thumbnail_path' => '',
                'category' => [
                    'title' => "Cloud Computing",
                    'slug' => "cloud-computing",
                ],
                'author' => [
                    'name' => "Dr. Cloud Architect"
                ],
                'title' => "Cloud Computing: Best Practices for 2023",
                'content' => "Learn the most effective strategies for leveraging cloud computing in your projects.",
                'created_at' => Carbon::parse('2023-06-10 00:00:00'),
                'reading_duration' => 6,
            ],
        ];

        $recentPosts = Post::latest()->take(3)->get();

        return view('index', [
            'featuredPosts' => $featuredPosts,
            'recentPosts' => $recentPosts,
        ]);
    }
}
