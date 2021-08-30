<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;


use App\Models\APIResponse;
use App\Models\Category;
use App\Models\Pet;
use App\Models\Tag;



class PetController extends Controller
{

    private $status = array("available", "pending", "sold");
    private $response;

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
     * Upload pet image.
     *
     * @return void
     */
    public function uploadImage($petId, Request $request)
    {
        return;
    }

    /**
     * Create a new pet.
     *
     * @return APIResponse
     */
    public function create(Request $request)
    {
        $req = $request->all();

        //Check if category exist for id
        $category = Category::where('id', $req["category"]["id"])->get();
        if (count($category) == 0){
            $this->response->fill(['code' => 405, 'type' => 'json', 'message' => "Invalid input, category id not found"]);
            return new JsonResponse($this->response, 405);
        }

        $tags = [];
        foreach($req["tags"] as $t){
            $tag = Tag::where('id', $t["id"])->get();
            if (count($tag) == 0){
                $this->response->fill(['code' => 405, 'type' => 'json', 'message' => "Invalid input, tag id not found"]);
                return new JsonResponse($this->response, 405);    
            }
            array_push($tags, $t["id"]);
        }

        if (isset($req["name"]) && isset($req["status"]) && ($req["status"] == "available" || $req["status"] == "sold" || $req["status"] == "pending") ) {
            // Retrieve pet by name or create it with the name, ...
            $pet = Pet::firstOrCreate(
                ['name' => $req["name"],
                'category' => $req["category"]["id"], 'name' => $req["name"], 'photoUrls' => json_encode($req["photoUrls"]), 'tags' => json_encode($tags), 'status' => $req["status"]]);
            return new JsonResponse($pet, 200);
        } else {
            $this->response->fill(['code' => 405, 'type' => 'json', 'message' => "Invalid input, name not set or status is invalid"]);
            return new JsonResponse($this->response, 405);    
        }

    }

    /**
     * Update existing pet.
     *
     * @return void
     */
    public function update(Request $request)
    {
        return;
    }

    /**
     * Update existing pet.
     *
     * @return void
     */
    public function updateInvalid($petId, Request $request)
    {
        return;
    }

    /**
     * Get pets via status.
     *
     * @return APIResponse
     */
    public function getByStatus(Request $request)
    {
        //Get all parameters request
        $req = $request->all();

        //Check if parameter status exists and is not empty
        if (empty($req["status"])){
            $this->response->fill(['code' => 500, 'type' => 'json', 'message' => "Invalid request, parameter 'Status' is missing or empty"]);
            return new JsonResponse($this->response, 500);
        }

        //Check parameter status values
        $array = explode(',', $req["status"]);
        foreach($array as $status){
            if(!in_array($status, $this->status)){
                $this->response->fill(['code' => 400, 'type' => 'json', 'message' => "Bad request, parameters accepted are 'available', 'pending', 'sold'"]);
                return new JsonResponse($this->response, 400);
            }
        }

        //Get pets
        $pets = Pet::whereIn('status', $array)->get();
        $this->response->fill(['code' => 200, 'type' => 'json', 'message' => 'Successful operation', 'data' => $pets]);
        return new JsonResponse($this->response, 200);

    }

    /**
     * Get pets via tags.
     *
     * @return void
     */
    public function getByTags(Request $request)
    {
        return;
    }

    /**
     * Get pet via id.
     *
     * @return APIResponse
     */
    public function getById($petId)
    {
        if(!is_numeric($petId)){
            $this->response->fill(['code' => 400, 'type' => 'json', 'message' => "Invalid ID supplied"]);
            return new JsonResponse($this->response, 400);
        }

        //Check if pet exist for id
        $pet = Pet::where('id', $petId)->get();
        if (count($pet) == 0){
            $this->response->fill(['code' => 404, 'type' => 'json', 'message' => "Pet not found"]);
            return new JsonResponse($this->response, 404);
        }

        //Get pet
        $this->response->fill(['code' => 200, 'type' => 'json', 'message' => 'Successful operation', 'data' => $pet]);
        return new JsonResponse($this->response, 200);
    }

        /**
     * Get pet via id.
     *
     * @return APIResponse
     */
    public function getAll()
    {
        //Check if pet exist for id
        $pets = Pet::get();

        //Get pet
        $this->response->fill(['code' => 200, 'type' => 'json', 'message' => 'Successful operation', 'data' => $pets]);
        return new JsonResponse($this->response, 200);
    }

    /**
     * Delete pets via id.
     *
     * @return APIResponse
     */
    public function delete($petId)
    {
        if(!is_numeric($petId)){
            $this->response->fill(['code' => 400, 'type' => 'json', 'message' => "Invalid ID supplied"]);
            return new JsonResponse($this->response, 400);
        }

        //Check if pet exist for id
        $pet = Pet::where('id', $petId)->get();
        if (count($pet) == 0){
            $this->response->fill(['code' => 404, 'type' => 'json', 'message' => "Pet not found"]);
            return new JsonResponse($this->response, 404);
        }

        //Delete pet
        Pet::where('id', $petId)->delete();

        $this->response->fill(['code' => 200, 'type' => 'json', 'message' => 'Successful operation']);
        return new JsonResponse($this->response, 200);
    }
}
