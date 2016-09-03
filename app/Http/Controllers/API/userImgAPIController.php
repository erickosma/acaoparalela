<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateuserImgAPIRequest;
use App\Http\Requests\API\UpdateuserImgAPIRequest;
use App\Models\userImg;
use App\Repositories\UserImgRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class userImgController
 * @package App\Http\Controllers\API
 */

class userImgAPIController extends InfyOmBaseController
{
    /** @var  userImgRepository */
    private $userImgRepository;

    public function __construct(userImgRepository $userImgRepo)
    {
        $this->userImgRepository = $userImgRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/userImgs",
     *      summary="Get a listing of the userImgs.",
     *      tags={"userImg"},
     *      description="Get all userImgs",
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
     *                  @SWG\Items(ref="#/definitions/userImg")
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
        $this->userImgRepository->pushCriteria(new RequestCriteria($request));
        $this->userImgRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userImgs = $this->userImgRepository->all();

        return $this->sendResponse($userImgs->toArray(), 'userImgs retrieved successfully');
    }

    /**
     * @param CreateuserImgAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/userImgs",
     *      summary="Store a newly created userImg in storage",
     *      tags={"userImg"},
     *      description="Store userImg",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="userImg that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/userImg")
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
     *                  ref="#/definitions/userImg"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateuserImgAPIRequest $request)
    {
        $input = $request->all();
        $userImgs = $this->userImgRepository->create($input);

        return $this->sendResponse($userImgs->toArray(), 'userImg saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/userImgs/{id}",
     *      summary="Display the specified userImg",
     *      tags={"userImg"},
     *      description="Get userImg",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of userImg",
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
     *                  ref="#/definitions/userImg"
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
        /** @var userImg $userImg */
        $userImg = $this->userImgRepository->findWithoutFail($id);

        if (empty($userImg)) {
            return Response::json(ResponseUtil::makeError('userImg not found'), 404);
        }

        return $this->sendResponse($userImg->toArray(), 'userImg retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateuserImgAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/userImgs/{id}",
     *      summary="Update the specified userImg in storage",
     *      tags={"userImg"},
     *      description="Update userImg",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of userImg",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="userImg that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/userImg")
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
     *                  ref="#/definitions/userImg"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateuserImgAPIRequest $request)
    {
        $input = $request->all();

        /** @var userImg $userImg */
        $userImg = $this->userImgRepository->find($id);

        if (empty($userImg)) {
            return Response::json(ResponseUtil::makeError('userImg not found'), 404);
        }

        $userImg = $this->userImgRepository->update($input, $id);

        return $this->sendResponse($userImg->toArray(), 'userImg updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/userImgs/{id}",
     *      summary="Remove the specified userImg from storage",
     *      tags={"userImg"},
     *      description="Delete userImg",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of userImg",
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
        /** @var userImg $userImg */
        $userImg = $this->userImgRepository->find($id);

        if (empty($userImg)) {
            return Response::json(ResponseUtil::makeError('userImg not found'), 404);
        }

        $userImg->delete();

        return $this->sendResponse($id, 'userImg deleted successfully');
    }
}
