<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAjudaRequest;
use App\Http\Requests\UpdateAjudaRequest;
use App\Repositories\AjudaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AjudaController extends InfyOmBaseController
{
    /** @var  AjudaRepository */
    private $ajudaRepository;

    public function __construct(AjudaRepository $ajudaRepo)
    {
        $this->ajudaRepository = $ajudaRepo;
    }

    /**
     * Display a listing of the Ajuda.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ajudaRepository->pushCriteria(new RequestCriteria($request));
        $ajudas = $this->ajudaRepository->all();

        return view('ajudas.index')
            ->with('ajudas', $ajudas);
    }

    /**
     * Show the form for creating a new Ajuda.
     *
     * @return Response
     */
    public function create()
    {
        return view('ajudas.create');
    }

    /**
     * Store a newly created Ajuda in storage.
     *
     * @param CreateAjudaRequest $request
     *
     * @return Response
     */
    public function store(CreateAjudaRequest $request)
    {
        $input = $request->all();

        $ajuda = $this->ajudaRepository->create($input);

        Flash::success('Ajuda saved successfully.');

        return redirect(route('ajudas.index'));
    }

    /**
     * Display the specified Ajuda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ajuda = $this->ajudaRepository->findWithoutFail($id);

        if (empty($ajuda)) {
            Flash::error('Ajuda not found');

            return redirect(route('ajudas.index'));
        }

        return view('ajudas.show')->with('ajuda', $ajuda);
    }

    /**
     * Show the form for editing the specified Ajuda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ajuda = $this->ajudaRepository->findWithoutFail($id);

        if (empty($ajuda)) {
            Flash::error('Ajuda not found');

            return redirect(route('ajudas.index'));
        }

        return view('ajudas.edit')->with('ajuda', $ajuda);
    }

    /**
     * Update the specified Ajuda in storage.
     *
     * @param  int              $id
     * @param UpdateAjudaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAjudaRequest $request)
    {
        $ajuda = $this->ajudaRepository->findWithoutFail($id);

        if (empty($ajuda)) {
            Flash::error('Ajuda not found');

            return redirect(route('ajudas.index'));
        }

        $ajuda = $this->ajudaRepository->update($request->all(), $id);

        Flash::success('Ajuda updated successfully.');

        return redirect(route('ajudas.index'));
    }

    /**
     * Remove the specified Ajuda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ajuda = $this->ajudaRepository->findWithoutFail($id);

        if (empty($ajuda)) {
            Flash::error('Ajuda not found');

            return redirect(route('ajudas.index'));
        }

        $this->ajudaRepository->delete($id);

        Flash::success('Ajuda deleted successfully.');

        return redirect(route('ajudas.index'));
    }
}