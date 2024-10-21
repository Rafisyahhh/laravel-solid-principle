<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use App\Models\Resident;
use App\Traits\UploadTrait;

class ResidentService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreResidentRequest $request
     *
     * @return array|bool
     */
    public function store(StoreResidentRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'name' => $data['name'],
            'place_birth' => $data['place_birth'],
            'date_birth' => $data['date_birth'],
            'gender' => $data['gender'],
            'address_id' => $data['address_id'],
            'education_id' => $data['education_id'],
            'work_id' => $data['work_id'],
            'status_id' => $data['status_id'],
            // Menggunakan disk 'uploads/residents'
            'foto' => $this->upload('uploads/residents', $request->file('foto')),
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateResidentRequest $request
     * @param Resident $resident
     * @return array|bool
     */
    public function update(UpdateResidentRequest $request, Resident $resident): array|bool
    {
        $data = $request->validated();

        $old_photo = $resident->foto;

        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            $this->remove($old_photo);

            // Upload file baru ke disk 'uploads/residents'
            $old_photo = $this->upload('uploads/residents', $request->file('foto'));
        }

        return [
            'name' => $data['name'],
            'place_birth' => $data['place_birth'],
            'date_birth' => $data['date_birth'],
            'gender' => $data['gender'],
            'address_id' => $data['address_id'],
            'education_id' => $data['education_id'],
            'work_id' => $data['work_id'],
            'status_id' => $data['status_id'],
            'foto' => $old_photo,
        ];
    }
}
