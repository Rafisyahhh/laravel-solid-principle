<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AddressInterface;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressRepository extends BaseRepository implements AddressInterface
{
    /**
     * Method __construct
     *
     * @param Address $address [explicite description]
     *
     * @return void
     */
    public function __construct(Address $address)
    {
        $this->model = $address;
    }
    /**
     * Method search
     *
     * @param Request $request [explicite description]
     *
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model->query()->get();
    }
    /**
     * Method store
     *
     * @param array $data [explicite description]
     *
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    /**
     * Method show
     *
     * @param mixed $id [explicite description]
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    /**
     * Method update
     *
     * @param mixed $id [explicite description]
     * @param array $data [explicite description]
     *
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }
    /**
     * Method delete
     *
     * @param mixed $id [explicite description]
     *
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)->delete();
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }
    /**
     * Handle the Get all data count event from models.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->model->query()
            ->count();
    }

}
