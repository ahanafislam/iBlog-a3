<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File as IlluminateFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1. Get a random image from the source directory (public/thumbnails)
        $sourceFiles = File::files(public_path('thumbnails'));
        $randomSourceFile = $sourceFiles[array_rand($sourceFiles)];

        // 2. Copy it to the storage disk (storage/app/public/thumbnails)
        // The putFile method generates a unique name and returns the path.
        $thumbnailPath = Storage::disk('public')->putFile('thumbnails', new IlluminateFile($randomSourceFile->getRealPath()));

        return [
            'author_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'thumbnail_path' => $thumbnailPath,
            'title' => $this->faker->unique()->sentence(),
            'content' => $this->faker->paragraphs(100, true),
        ];
    }
}
