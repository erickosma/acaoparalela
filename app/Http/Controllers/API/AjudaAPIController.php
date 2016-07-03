<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAjudaAPIRequest;
use App\Http\Requests\API\UpdateAjudaAPIRequest;
use App\Models\Ajuda;
use App\Repositories\AjudaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AjudaController
 * @package App\Http\Controllers\API
 */

class AjudaAPIController extends InfyOmBaseController
{
    /** @var  AjudaRepository */
    private $ajudaRepository;

    public function __construct(AjudaRepository $ajudaRepo)
    {
        $this->ajudaRepository = $ajudaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ajudas",
     *      summary="Get a listing of the Ajudas.",
     *      tags={"Ajuda"},
     *      description="Get all Ajudas",
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
     *                  @SWG\Items(ref="#/definitions/Ajuda")
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
        $this->ajudaRepository->pushCriteria(new RequestCriteria($request));
        $this->ajudaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ajudas = $this->ajudaRepository->all();

        return $this->sendResponse($ajudas->toArray(), 'Ajudas retrieved successfully');
    }

    /**
     * @param CreateAjudaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ajudas",
     *      summary="Store a newly created Ajuda in storage",
     *      tags={"Ajuda"},
     *      description="Store Ajuda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ajuda that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ajuda")
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
     *                  ref="#/definitions/Ajuda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAjudaAPIRequest $request)
    {
        $input = $request->all();

        $ajudas = $this->ajudaRepository->create($input);

        return $this->sendResponse($ajudas->toArray(), 'Ajuda saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ajudas/{id}",
     *      summary="Display the specified Ajuda",
     *      tags={"Ajuda"},
     *      description="Get Ajuda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ajuda",
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
     *                  ref="#/definitions/Ajuda"
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
        /** @var Ajuda $ajuda */
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            return Response::json(ResponseUtil::makeError('Ajuda not found'), 404);
        }

        return $this->sendResponse($ajuda->toArray(), 'Ajuda retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAjudaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ajudas/{id}",
     *      summary="Update the specified Ajuda in storage",
     *      tags={"Ajuda"},
     *      description="Update Ajuda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ajuda",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ajuda that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ajuda")
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
     *                  ref="#/definitions/Ajuda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAjudaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ajuda $ajuda */
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            return Response::json(ResponseUtil::makeError('Ajuda not found'), 404);
        }

        $ajuda = $this->ajudaRepository->update($input, $id);

        return $this->sendResponse($ajuda->toArray(), 'Ajuda updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ajudas/{id}",
     *      summary="Remove the specified Ajuda from storage",
     *      tags={"Ajuda"},
     *      description="Delete Ajuda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ajuda",
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
        /** @var Ajuda $ajuda */
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            return Response::json(ResponseUtil::makeError('Ajuda not found'), 404);
        }

        $ajuda->delete();

        return $this->sendResponse($id, 'Ajuda deleted successfully');
    }
}
