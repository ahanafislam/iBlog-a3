<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredPosts = [
            [
                'id' => 1,
                'thumbnail_url' => 'https://placehold.co/480x200/png',
                'category' => "Web Development",
                'date' => "May 15, 2023",
                'reading_duration' => "5",
                'title' => "The Future of Web Development in 2023",
                'content' => "Explore the latest trends and technologies shaping the future of web development this year.",
            ],
            [
                'id' => 2,
                'thumbnail_url' => 'https://placehold.co/480x200/png',
                'category' => "Artificial Intelligence",
                'date' => "June 2, 2023",
                'reading_duration' => "8",
                'title' => "Getting Started with AI and Machine Learning",
                'content' => "A beginner's guide to understanding and implementing AI and machine learning concepts.",
            ],
            [
                'id' => 3,
                'thumbnail_url' => 'https://placehold.co/480x200/png',
                'category' => "Cloud Computing",
                'date' => "June 10, 2023",
                'reading_duration' => "6",
                'title' => "Cloud Computing: Best Practices for 2023",
                'content' => "Learn the most effective strategies for leveraging cloud computing in your projects.",
            ]
        ];

        $recentPosts = [
            [
                'id' => 4,
                'thumbnail_url' => 'https://placehold.co/480x200/png',
                'category' => 'Web Development',
                'date' => 'July 5, 2023',
                'reading_duration' => '7',
                'title' => 'React 18: What\'s New and Improved',
                'content' => 'Discover the exciting new features and improvements in React 18 and how they can benefit your projects.',
            ],
            [
                'id' => 5,
                'thumbnail_url' => 'https://placehold.co/480x200/png',
                'category' => 'Cybersecurity',
                'date' => 'July 12, 2023',
                'reading_duration' => '10',
                'title' => 'Cybersecurity Essentials for Developers',
                'content' => 'Key security practices every developer should implement to protect their applications and users.',
            ],
            [
                'id' => 6,
                'thumbnail_url' => 'https://placehold.co/480x200/png',
                'category' => 'Development',
                'date' => 'July 18, 2023',
                'reading_duration' => '6',
                'title' => 'The Rise of Low-Code Development Platforms',
                'content' => 'How low-code platforms are changing the software development landscape and who should use them.',
            ],
        ];

        return view('index', [
            'featuredPosts' => $featuredPosts,
            'recentPosts' => $recentPosts,
        ]);
    }
}
