<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredPosts = [
            [
                'id' => 1,
                'thumbnail_path' => 'https://placehold.co/480x200/png',
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
                'thumbnail_path' => 'https://placehold.co/480x200/png',
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
                'thumbnail_path' => 'https://placehold.co/480x200/png',
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


        $recentPosts = [
            [
                'id' => 4,
                'thumbnail_path' => 'https://placehold.co/480x200/png',
                'category' => [
                    'title' => "Web Development",
                    'slug' => "web-development",
                ],
                'author' => [
                    'name' => "Mr. Supper Cool Man",
                ],
                'title' => "React 18: What's New and Improved",
                'content' => "Discover the exciting new features and improvements in React 18 and how they can benefit your projects.",
                'created_at' => Carbon::parse('2023-07-05 00:00:00'),
                'reading_duration' => 7,
            ],
            [
                'id' => 5,
                'thumbnail_path' => 'https://placehold.co/480x200/png',
                'category' => [
                    'title' => "Cybersecurity",
                    'slug' => "cybersecurity",
                ],
                'author' => [
                    'name' => "Ms. Firewall Defender",
                ],
                'title' => "Cybersecurity Essentials for Developers",
                'content' => "Key security practices every developer should implement to protect their applications and users.",
                'created_at' => Carbon::parse('2023-07-12 00:00:00'),
                'reading_duration' => 10,
            ],
            [
                'id' => 6,
                'thumbnail_path' => 'https://placehold.co/480x200/png',
                'category' => [
                    'title' => "Development",
                    'slug' => "development",
                ],
                'author' => [
                    'name' => "Dr. Code Builder",
                ],
                'title' => "The Rise of Low-Code Development Platforms",
                'content' => "How low-code platforms are changing the software development landscape and who should use them.",
                'created_at' => Carbon::parse('2023-07-18 00:00:00'),
                'reading_duration' => 6,
            ],
        ];

        return view('index', [
            'featuredPosts' => $featuredPosts,
            'recentPosts' => $recentPosts,
        ]);
    }
}
