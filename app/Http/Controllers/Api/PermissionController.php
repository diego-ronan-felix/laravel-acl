<?php

namespace App\Http\Controllers\Api;

use App\DTO\Permission\CreatePermissionDTO;
use App\DTO\Permission\EditPermissionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePermissionRequest;
use App\Http\Requests\Api\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    
    public function __construct(private PermissionRepository $userRepository)
    {
    }
    
    public function index(Request $request)
    {
        $users = $this->userRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->filter ?? ''
        );
        return PermissionResource::collection($users);
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = $this->userRepository->createNew(new CreatePermissionDTO(... $request->validated()));
        return new PermissionResource($permission);
    }

    public function show(string $id)
    {
        if(!$permission = $this->userRepository->findById($id)) {
            return response()->json(['message' => 'permission not found!'], 404);
        }
        return new PermissionResource($permission);
    }

    public function update(UpdatePermissionRequest $request, string $id)
    {
        $response = $this->userRepository->update(new EditPermissionDTO(...[$id, ...$request->validated()]));
        if (!$response) {
            return response()->json(['message' => 'permission not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'permission updated with success']);
    }

    public function destroy(string $id)
    {
        if(!$this->userRepository->delete($id)) {
            return response()->json(['message' => 'permission not found!'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
