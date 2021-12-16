<?php

namespace App\Actions\Tomodachi;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasCoverPhoto
{
    /**
     * Update the game's cover photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateCoverPhoto(UploadedFile $photo)
    {
        tap($this->cover_photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'cover_photo_path' => $photo->storePublicly(
                    'division', ['disk' => $this->coverPhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->coverPhotoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the game's cover photo.
     *
     * @return void
     */
    public function deleteCoverPhoto()
    {
        Storage::disk($this->coverPhotoDisk())->delete($this->cover_photo_path);

        $this->forceFill([
            'cover_photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the game's cover photo.
     *
     * @return string
     */
    public function getCoverPhotoUrlAttribute()
    {
        return $this->cover_photo_path
                    ? Storage::disk($this->coverPhotoDisk())->url($this->cover_photo_path)
                    : $this->defaultCoverPhotoUrl();
    }

    /**
     * Get the default cover photo URL if no cover photo has been uploaded.
     *
     * @return string
     */
    protected function defaultCoverPhotoUrl()
    {
        return null;
    }

    /**
     * Get the disk that cover photos should be stored on.
     *
     * @return string
     */
    protected function coverPhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
}
