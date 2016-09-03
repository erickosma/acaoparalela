<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserOngAPIRequest;
use App\Http\Requests\API\UpdateUserOngAPIRequest;
use App\Models\UserOng;
use App\Repositories\UserOngRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserOngController
 * @package App\Http\Controllers\API
 */

class UserOngAPIController extends InfyOmBaseController
{
    /** @var  UserOngRepository */
    private $userOngRepository;

    public function __construct(UserOngRepository $userOngRepo)
    {
        $this->userOngRepository = $userOngRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/userOngs",
     *      summary="Get a listing of the UserOngs.",
     *      tags={"UserOng"},
     *      description="Get all UserOngs",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/UserOng")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->userOngRepository->pushCriteria(new RequestCriteria($request));
        $this->userOngRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userOngs = $this->userOngRepository->all();

        return $this->sendResponse($userOngs->toArray(), 'UserOngs retrieved successfully');
    }

    /**
     * @param CreateUserOngAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/userOngs",
     *      summary="Store a newly created UserOng in storage",
     *      tags={"UserOng"},
     *      description="Store UserOng",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="UserOng that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/UserOng")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/UserOng"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateUserOngAPIRequest $request)
    {
        $input = $request->all();

        $userOngs = $this->userOngRepository->create($input);

        return $this->sendResponse($userOngs->toArray(), 'UserOng saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/userOngs/{id}",
     *      summary="Display the specified UserOng",
     *      tags={"UserOng"},
     *      description="Get UserOng",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UserOng",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/UserOng"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var UserOng $userOng */
        $userOng = $this->userOngRepository->findWithoutFail($id);

        if (empty($userOng)) {
            return Response::json(ResponseUtil::makeError('UserOng not found'), 404);
        }

        return $this->sendResponse($userOng->toArray(), 'UserOng retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateUserOngAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/userOngs/{id}",
     *      summary="Update the specified UserOng in storage",
     *      tags={"UserOng"},
     *      description="Update UserOng",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UserOng",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="UserOng that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/UserOng")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/UserOng"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateUserOngAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserOng $userOng */
        $userOng = $this->userOngRepository->find($id);

        if (empty($userOng)) {
            return Response::json(ResponseUtil::makeError('UserOng not found'), 404);
        }

        $userOng = $this->userOngRepository->update($input, $id);

        return $this->sendResponse($userOng->toArray(), 'UserOng updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/userOngs/{id}",
     *      summary="Remove the specified UserOng from storage",
     *      tags={"UserOng"},
     *      description="Delete UserOng",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UserOng",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var UserOng $userOng */
        $userOng = $this->userOngRepository->findWithoutFail($id);

        if (empty($userOng)) {
            return Response::json(ResponseUtil::makeError('UserOng not found'), 404);
        }

        $userOng->delete();

        return $this->sendResponse($id, 'UserOng deleted successfully');
    }
}
