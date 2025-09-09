<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create the parent categories that have children
        $webDev = Category::factory()->create([
            'title' => 'Web Development',
            'slug' => Str::slug('Web Development'),
        ]);

        $ai = Category::factory()->create([
            'title' => 'Artificial Intelligence',
            'slug' => Str::slug('Artificial Intelligence'),
        ]);

        // 2. Create the child categories for "Web Development"
        Category::factory()->create(['title' => 'Frontend', 'slug' => Str::slug('Frontend'), 'parent_id' => $webDev->id]);
        Category::factory()->create(['title' => 'Backend', 'slug' => Str::slug('Backend'), 'parent_id' => $webDev->id]);
        Category::factory()->create(['title' => 'Full Stack', 'slug' => Str::slug('Full Stack'), 'parent_id' => $webDev->id]);

        // 3. Create the child categories for "Artificial Intelligence"
        Category::factory()->create(['title' => 'Machine Learning', 'slug' => Str::slug('Machine Learning'), 'parent_id' => $ai->id]);
        Category::factory()->create(['title' => 'Deep Learning', 'slug' => Str::slug('Deep Learning'), 'parent_id' => $ai->id]);
        Category::factory()->create(['title' => 'NLP', 'slug' => Str::slug('NLP'), 'parent_id' => $ai->id]);

        // 4. Create the other top-level categories that don't have children
        Category::factory()->create(['title' => 'Cloud Computing', 'slug' => Str::slug('Cloud Computing')]);
        Category::factory()->create(['title' => 'Cybersecurity', 'slug' => Str::slug('Cybersecurity')]);
        Category::factory()->create(['title' => 'Mobile App Development', 'slug' => Str::slug('Mobile Development')]);
        Category::factory()->create(['title' => 'DevOps', 'slug' => Str::slug('DevOps')]);
    }
}
