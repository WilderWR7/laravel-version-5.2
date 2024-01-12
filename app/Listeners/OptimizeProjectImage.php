<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class OptimizeProjectImage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectSaved $event): void
    {
        throw new \Exception('Error optimizing the image',1);
        $manager = new ImageManager(new Driver());
        $image = $manager->read(storage_path('app/public/'.$event->project->image));
        // $image = ImageManager::imagick()->read(storage_path('app/public/'.$project->image));
        $image->resize(height:100);
        $image->toWebp()->save(storage_path('app/public/'.$event->project->image));
    }
}
