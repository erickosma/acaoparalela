<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAreaAtuacaoAPIRequest;
use App\Http\Requests\API\UpdateUserAreaAtuacaoAPIRequest;
use App\Models\UserAreaAtuacao;
use App\Repositories\UserAreaAtuacaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserAreaAtuacaoController
 * @package App\Http\Controllers\API
 */

class UserAreaAtuacaoAPIController extends InfyOmBaseController
{
    /** @var  UserAreaAtuacaoRepository */
    private $userAreaAtuacaoRepository;

    public function __construct(UserAreaAtuacaoRepository $userAreaAtuacaoRepo)
    {
        $this->userAreaAtuacaoRepository = $userAreaAtuacaoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/userAreaAtuacaos",
     *      summary="Get a listing of the UserAreaAtuacaos.",
     *      tags={"UserAreaAtuacao"},
     *      description="Get all UserAreaAtuacaos",
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
     *                  @SWG\Items(ref="#/definitions/UserAreaAtuacao")
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
        $this->userAreaAtuacaoRepository->pushCriteria(new RequestCriteria($request));
        $this->userAreaAtuacaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userAreaAtuacaos = $this->userAreaAtuacaoRepository->all();

        return $this->sendResponse($userAreaAtuacaos->toArray(), 'UserAreaAtuacaos retrieved successfully');
    }

    /**
     * @param CreateUserAreaAtuacaoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/userAreaAtuacaos",
     *      summary="Store a newly created UserAreaAtuacao in storage",
     *      tags={"UserAreaAtuacao"},
     *      description="Store UserAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="UserAreaAtuacao that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/UserAreaAtuacao")
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
     *                  ref="#/definitions/UserAreaAtuacao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateUserAreaAtuacaoAPIRequest $request)
    {
        $input = $request->all();

        $userAreaAtuacaos = $this->userAreaAtuacaoRepository->create($input);

        return $this->sendResponse($userAreaAtuacaos->toArray(), 'UserAreaAtuacao saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/userAreaAtuacaos/{id}",
     *      summary="Display the specified UserAreaAtuacao",
     *      tags={"UserAreaAtuacao"},
     *      description="Get UserAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UserAreaAtuacao",
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
     *                  ref="#/definitions/UserAreaAtuacao"
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
        /** @var UserAreaAtuacao $userAreaAtuacao */
        $userAreaAtuacao = $this->userAreaAtuacaoRepository->findWithoutFail($id);

        if (empty($userAreaAtuacao)) {
            return Response::json(ResponseUtil::makeError('UserAreaAtuacao not found'), 404);
        }

        return $this->sendResponse($userAreaAtuacao->toArray(), 'UserAreaAtuacao retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateUserAreaAtuacaoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/userAreaAtuacaos/{id}",
     *      summary="Update the specified UserAreaAtuacao in storage",
     *      tags={"UserAreaAtuacao"},
     *      description="Update UserAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UserAreaAtuacao",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="UserAreaAtuacao that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/UserAreaAtuacao")
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
     *                  ref="#/definitions/UserAreaAtuacao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateUserAreaAtuacaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserAreaAtuacao $userAreaAtuacao */
        $userAreaAtuacao = $this->userAreaAtuacaoRepository->find($id);

        if (empty($userAreaAtuacao)) {
            return Response::json(ResponseUtil::makeError('UserAreaAtuacao not found'), 404);
        }

        $userAreaAtuacao = $this->userAreaAtuacaoRepository->update($input, $id);

        return $this->sendResponse($userAreaAtuacao->toArray(), 'UserAreaAtuacao updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/userAreaAtuacaos/{id}",
     *      summary="Remove the specified UserAreaAtuacao from storage",
     *      tags={"UserAreaAtuacao"},
     *      description="Delete UserAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UserAreaAtuacao",
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
        /** @var UserAreaAtuacao $userAreaAtuacao */
        $userAreaAtuacao = $this->userAreaAtuacaoRepository->find($id);

        if (empty($userAreaAtuacao)) {
            return Response::json(ResponseUtil::makeError('UserAreaAtuacao not found'), 404);
        }

        $userAreaAtuacao->delete();

        return $this->sendResponse($id, 'UserAreaAtuacao deleted successfully');
    }
}
