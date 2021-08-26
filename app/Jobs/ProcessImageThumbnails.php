<?php
// app/Jobs/ProcessImageThumbnails.php
namespace App\Jobs;

use App\Models\Image as ImageModel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProcessImageThumbnails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $imageModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ImageModel $imageModel)
    {
        $this->imageModel = $imageModel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // access the model in the queue for processing
        Log::info('$this->imageModel->org_path : ' . $this->imageModel->org_path);
        $full_image_path = $this->imageModel->org_path;
        Log::info('$full_image_path : ' . $full_image_path);
        $path_parts = pathinfo($full_image_path);
        $resized_image_path = $path_parts['dirname'] . DIRECTORY_SEPARATOR . 'thumbs' . DIRECTORY_SEPARATOR;
        Log::info('$resized_image_path : ' . $resized_image_path);

        // create image thumbs from the original image
        $img = Storage::Disk('public')->get($full_image_path);
        Log::info('Готов $img');

        $ext = $path_parts['extension'];
        $path = $full_image_path;
        $path = Storage::disk('public')->path($path); // абсолютный путь
        Log::info('$ext : ' . $ext . ',  $path : ' . $path);
        Storage::disk('public')->put('copy/' . basename($full_image_path), $img);
        // создаем уменьшенное изображение 600x300px, качество 100%
        $dst = 'thumbs600300/';
        $this->resize($path, $dst, 600, 300, $ext);
        // создаем уменьшенное изображение 300x150px, качество 100%
        $dst = 'thumbs300150/';
        $this->resize($path, $dst, 300, 150, $ext);
        // создаем уменьшенное изображение 200x150px, качество 100%
        $dst = 'thumbs200150/';
        $this->resize($path, $dst, 200, 150, $ext);
        // создаем уменьшенное изображение 100x80px, качество 100%
        $dst = 'thumbs10080/';
        $this->resize($path, $dst, 100, 80, $ext);
    }

    private function resize($src, $dst, $width, $height, $ext) {
        // создаем уменьшенное изображение width x height, качество 100%
        $image = Image::make($src)
            ->heighten($height)
            ->resizeCanvas($width, $height, 'center', false, 'eeeeee')
            ->encode($ext, 100);
        // сохраняем это изображение под тем же именем, что исходное
        $name = basename($src);
        Storage::disk('public')->put($dst . $name, $image);
        $image->destroy();
    }
}
