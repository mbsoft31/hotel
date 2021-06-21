<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Features;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updatePhoto(UploadedFile $photo)
    {
        tap($this->photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'profile_photo_path' => $photo->storePublicly(
                    'profile-photos', ['disk' => $this->photoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->photoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {

        Storage::disk($this->photoDisk())->delete($this->photo_path);

        $this->forceFill([
            'photo_path' => null,
        ])->save();
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo_path
            ? Storage::disk($this->photoDisk())->url($this->photo_path)
            : $this->defaultPhotoUrl();
    }

    /**
     * Get the default profile photo URL if no photo has been uploaded.
     *
     * @return string
     */
    protected function defaultPhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=db2777&background=fdf2f8';
    }

    /**
     * Get the disk that photos should be stored on.
     *
     * @return string
     */
    protected function photoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('hotel.photo_disk', 'public');
    }
}
