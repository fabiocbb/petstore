<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->response = new APIResponse;
    }

    /**
     * Create users via list
     *
     * @return void
     */
    public function createWithList(Request $request)
    {
        //
    }

    /**
     * Get user via username
     *
     * @return void
     */
    public function getByUsername($username)
    {
        //
    }

    /**
     * Update user via username
     *
     * @return void
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Delete user via username
     *
     * @return void
     */
    public function delete($petId)
    {
        //
    }

    /**
     * Login user
     *
     * @return void
     */
    public function login(Request $request)
    {
        //
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout(Request $request)
    {
        //
    }

    /**
     * Create users via array
     *
     * @return void
     */
    public function createWithArray(Request $request)
    {
        //
    }

    /**
     * Create a new user
     *
     * @return void
     */
    public function createUser(Request $request)
    {
        //
    }

}
