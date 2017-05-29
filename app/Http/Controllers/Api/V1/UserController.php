<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\Api\UserStoreRequest;
use App\Repositories\UserRepository;
use Dingo\Api\Http\Request;
use Dingo\Api\Http\Response;

class UserController extends BaseController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserStoreRequest $request
     *
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = $this->userRepository->create($request->all());
        return $this->success($user);
    }

    /**
     * @return Response
     */
    public function getProfile()
    {
        return $this->success(request()->user());
    }
}
