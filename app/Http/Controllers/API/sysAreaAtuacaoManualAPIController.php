<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesysAreaAtuacaoManualAPIRequest;
use App\Http\Requests\API\UpdatesysAreaAtuacaoManualAPIRequest;
use App\Models\sysAreaAtuacaoManual;
use App\Repositories\SysAreaAtuacaoManualRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class sysAreaAtuacaoManualController
 * @package App\Http\Controllers\API
 */

class sysAreaAtuacaoManualAPIController extends InfyOmBaseController
{
    /** @var  SysAreaAtuacaoManualRepository */
    private $SysAreaAtuacaoManualRepository;

    public function __construct(SysAreaAtuacaoManualRepository $sysAreaAtuacaoManualRepo)
    {
        $this->SysAreaAtuacaoManualRepository = $sysAreaAtuacaoManualRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sysAreaAtuacaoManuals",
     *      summary="Get a listing of the sysAreaAtuacaoManuals.",
     *      tags={"sysAreaAtuacaoManual"},
     *      description="Get all sysAreaAtuacaoManuals",
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
     *                  @SWG\Items(ref="#/definitions/sysAreaAtuacaoManual")
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
        $this->SysAreaAtuacaoManualRepository->pushCriteria(new RequestCriteria($request));
        $this->SysAreaAtuacaoManualRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sysAreaAtuacaoManuals = $this->SysAreaAtuacaoManualRepository->all();

        return $this->sendResponse($sysAreaAtuacaoManuals->toArray(), 'sysAreaAtuacaoManuals retrieved successfully');
    }

    /**
     * @param CreatesysAreaAtuacaoManualAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sysAreaAtuacaoManuals",
     *      summary="Store a newly created sysAreaAtuacaoManual in storage",
     *      tags={"sysAreaAtuacaoManual"},
     *      description="Store sysAreaAtuacaoManual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="sysAreaAtuacaoManual that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/sysAreaAtuacaoManual")
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
     *                  ref="#/definitions/sysAreaAtuacaoManual"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesysAreaAtuacaoManualAPIRequest $request)
    {
        $input = $request->all();

        $sysAreaAtuacaoManuals = $this->SysAreaAtuacaoManualRepository->create($input);

        return $this->sendResponse($sysAreaAtuacaoManuals->toArray(), 'sysAreaAtuacaoManual saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sysAreaAtuacaoManuals/{id}",
     *      summary="Display the specified sysAreaAtuacaoManual",
     *      tags={"sysAreaAtuacaoManual"},
     *      description="Get sysAreaAtuacaoManual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of sysAreaAtuacaoManual",
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
     *                  ref="#/definitions/sysAreaAtuacaoManual"
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
        /** @var sysAreaAtuacaoManual $sysAreaAtuacaoManual */
        $sysAreaAtuacaoManual = $this->SysAreaAtuacaoManualRepository->findWithoutFail($id);

        if (empty($sysAreaAtuacaoManual)) {
            return Response::json(ResponseUtil::makeError('sysAreaAtuacaoManual not found'), 404);
        }

        return $this->sendResponse($sysAreaAtuacaoManual->toArray(), 'sysAreaAtuacaoManual retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesysAreaAtuacaoManualAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sysAreaAtuacaoManuals/{id}",
     *      summary="Update the specified sysAreaAtuacaoManual in storage",
     *      tags={"sysAreaAtuacaoManual"},
     *      description="Update sysAreaAtuacaoManual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of sysAreaAtuacaoManual",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="sysAreaAtuacaoManual that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/sysAreaAtuacaoManual")
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
     *                  ref="#/definitions/sysAreaAtuacaoManual"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesysAreaAtuacaoManualAPIRequest $request)
    {
        $input = $request->all();

        /** @var sysAreaAtuacaoManual $sysAreaAtuacaoManual */
        $sysAreaAtuacaoManual = $this->SysAreaAtuacaoManualRepository->find($id);

        if (empty($sysAreaAtuacaoManual)) {
            return Response::json(ResponseUtil::makeError('sysAreaAtuacaoManual not found'), 404);
        }

        $sysAreaAtuacaoManual = $this->SysAreaAtuacaoManualRepository->update($input, $id);

        return $this->sendResponse($sysAreaAtuacaoManual->toArray(), 'sysAreaAtuacaoManual updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sysAreaAtuacaoManuals/{id}",
     *      summary="Remove the specified sysAreaAtuacaoManual from storage",
     *      tags={"sysAreaAtuacaoManual"},
     *      description="Delete sysAreaAtuacaoManual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of sysAreaAtuacaoManual",
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
        /** @var sysAreaAtuacaoManual $sysAreaAtuacaoManual */
        $sysAreaAtuacaoManual = $this->SysAreaAtuacaoManualRepository->find($id);

        if (empty($sysAreaAtuacaoManual)) {
            return Response::json(ResponseUtil::makeError('sysAreaAtuacaoManual not found'), 404);
        }

        $sysAreaAtuacaoManual->delete();

        return $this->sendResponse($id, 'sysAreaAtuacaoManual deleted successfully');
    }
}
