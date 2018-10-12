<?php 

namespace App\Repositories;

/**
 * User Repository Class
 *  
 * @author Lalit Patel
 *
 */
class UserRepository
{
    /**
     * @var User
     */
    private $user;
    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
    public function all()
    {
        return $this->user->all();
    }
    /**
     * Create a new user
     *
     * @param array $user
     * @return mixed
     */
    public function create(array $user)
    {
        return $this->user->create($user);
    }
    /**
     * Find user by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->user->find($id);
    }
    /**
     * Update user with id
     *
     * @param string $id
     * @param array $user
     * @return mixed
     */
    public function update(string $id, array $user)
    {
        $userToUpdate = $this->user->find($id);
        $userToUpdate->update($user);
        return $userToUpdate->fresh();
    }
    /**
     * Delete user with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
}