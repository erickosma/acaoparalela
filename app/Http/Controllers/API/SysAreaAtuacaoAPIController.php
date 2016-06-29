<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSysAreaAtuacaoAPIRequest;
use App\Http\Requests\API\UpdateSysAreaAtuacaoAPIRequest;
use App\Models\SysAreaAtuacao;
use App\Repositories\SysAreaAtuacaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SysAreaAtuacaoController
 * @package App\Http\Controllers\API
 */

class SysAreaAtuacaoAPIController extends InfyOmBaseController
{
    /** @var  SysAreaAtuacaoRepository */
    private $sysAreaAtuacaoRepository;

    public function __construct(SysAreaAtuacaoRepository $sysAreaAtuacaoRepo)
    {
        $this->sysAreaAtuacaoRepository = $sysAreaAtuacaoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sysAreaAtuacaos",
     *      summary="Get a listing of the SysAreaAtuacaos.",
     *      tags={"SysAreaAtuacao"},
     *      description="Get all SysAreaAtuacaos",
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
     *                  @SWG\Items(ref="#/definitions/SysAreaAtuacao")
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
        $this->sysAreaAtuacaoRepository->pushCriteria(new RequestCriteria($request));
        $this->sysAreaAtuacaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sysAreaAtuacaos = $this->sysAreaAtuacaoRepository->all();

        return $this->sendResponse($sysAreaAtuacaos->toArray(), 'SysAreaAtuacaos retrieved successfully');
    }

    /**
     * @param CreateSysAreaAtuacaoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sysAreaAtuacaos",
     *      summary="Store a newly created SysAreaAtuacao in storage",
     *      tags={"SysAreaAtuacao"},
     *      description="Store SysAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SysAreaAtuacao that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SysAreaAtuacao")
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
     *                  ref="#/definitions/SysAreaAtuacao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSysAreaAtuacaoAPIRequest $request)
    {
        $input = $request->all();

        $sysAreaAtuacaos = $this->sysAreaAtuacaoRepository->create($input);

        return $this->sendResponse($sysAreaAtuacaos->toArray(), 'SysAreaAtuacao saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sysAreaAtuacaos/{id}",
     *      summary="Display the specified SysAreaAtuacao",
     *      tags={"SysAreaAtuacao"},
     *      description="Get SysAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SysAreaAtuacao",
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
     *                  ref="#/definitions/SysAreaAtuacao"
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
        /** @var SysAreaAtuacao $sysAreaAtuacao */
        $sysAreaAtuacao = $this->sysAreaAtuacaoRepository->find($id);

        if (empty($sysAreaAtuacao)) {
            return Response::json(ResponseUtil::makeError('SysAreaAtuacao not found'), 404);
        }

        return $this->sendResponse($sysAreaAtuacao->toArray(), 'SysAreaAtuacao retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSysAreaAtuacaoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sysAreaAtuacaos/{id}",
     *      summary="Update the specified SysAreaAtuacao in storage",
     *      tags={"SysAreaAtuacao"},
     *      description="Update SysAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SysAreaAtuacao",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SysAreaAtuacao that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SysAreaAtuacao")
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
     *                  ref="#/definitions/SysAreaAtuacao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSysAreaAtuacaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var SysAreaAtuacao $sysAreaAtuacao */
        $sysAreaAtuacao = $this->sysAreaAtuacaoRepository->find($id);

        if (empty($sysAreaAtuacao)) {
            return Response::json(ResponseUtil::makeError('SysAreaAtuacao not found'), 404);
        }

        $sysAreaAtuacao = $this->sysAreaAtuacaoRepository->update($input, $id);

        return $this->sendResponse($sysAreaAtuacao->toArray(), 'SysAreaAtuacao updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sysAreaAtuacaos/{id}",
     *      summary="Remove the specified SysAreaAtuacao from storage",
     *      tags={"SysAreaAtuacao"},
     *      description="Delete SysAreaAtuacao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SysAreaAtuacao",
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
        /** @var SysAreaAtuacao $sysAreaAtuacao */
        $sysAreaAtuacao = $this->sysAreaAtuacaoRepository->find($id);

        if (empty($sysAreaAtuacao)) {
            return Response::json(ResponseUtil::makeError('SysAreaAtuacao not found'), 404);
        }

        $sysAreaAtuacao->delete();

        return $this->sendResponse($id, 'SysAreaAtuacao deleted successfully');
    }
}
