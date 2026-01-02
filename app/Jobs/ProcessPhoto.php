<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class ProcessPhoto implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $full_path_to_original,
        public string $new_avatar_file_name,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sizes = config('animalphoto.sizes');
        $variant_path_pattern = config('animalphoto.variants_path_pattern');
        $avatar_type = config('animalphoto.avatar_file_type');
        $jpg_compression = config('animalphoto.jpg_compression');

        $original = Image::read(
            Storage::disk('public')
                ->get($this->full_path_to_original)
        );

        info('test');
        info(\gettype($sizes));

        foreach ($sizes as $size) {
            $variant = clone $original;
            $variant->scale($size['width']);
            $variant_path = sprintf($variant_path_pattern, $size['width'], $size['height']);
            Storage::disk('public')
                ->put(
                    $variant_path . '/' . $this->new_avatar_file_name,
                    $variant->encodeByExtension($avatar_type, $jpg_compression)
                );
        }
    }
}
