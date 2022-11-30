<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateworkerRequest;
use App\Http\Requests\UpdateworkerRequest;
use App\Repositories\workerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Role;

class workerController extends AppBaseController
{
    /** @var workerRepository $workerRepository*/
    private $workerRepository;

    public function __construct(workerRepository $workerRepo)
    {
        $this->workerRepository = $workerRepo;
    }

    /**
     * Display a listing of the worker.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $workers = $this->workerRepository->all();

        return view('workers.index')
            ->with('workers', $workers);
    }

    /**
     * Show the form for creating a new worker.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('workers.create')->with('roles',$roles);
    }

    /**
     * Store a newly created worker in storage.
     *
     * @param CreateworkerRequest $request
     *
     * @return Response
     */
    public function store(CreateworkerRequest $request)
    {
        $input = $request->all();

        $worker = $this->workerRepository->create($input);

        Flash::success('El trabajador se guardó correctamente.');

        return redirect(route('workers.index'));
    }

    /**
     * Display the specified worker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worker = $this->workerRepository->find($id);

        if (empty($worker)) {
            Flash::error('El trabajador no se encuentra');

            return redirect(route('workers.index'));
        }

        return view('workers.show')->with('worker', $worker);
    }

    /**
     * Show the form for editing the specified worker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worker = $this->workerRepository->find($id);
        $roles = Role::all()->pluck('name','id');
        
        if (empty($worker)) {
            Flash::error('El trabajador no se encuentra');

            return redirect(route('workers.index'));
        }

        return view('workers.edit')->with('worker', $worker)->with('roles',$roles);
    }

    /**
     * Update the specified worker in storage.
     *
     * @param int $id
     * @param UpdateworkerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateworkerRequest $request)
    {
        $worker = $this->workerRepository->find($id);

        if (empty($worker)) {
            Flash::error('El trabajador no se encuentra');

            return redirect(route('workers.index'));
        }

        $worker = $this->workerRepository->update($request->all(), $id);

        Flash::success('El trabajador se modificó correctamente.');

        return redirect(route('workers.index'));
    }

    /**
     * Remove the specified worker from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $worker = $this->workerRepository->find($id);

        if (empty($worker)) {
            Flash::error('El trabajador no se encuentra');

            return redirect(route('workers.index'));
        }

        $this->workerRepository->delete($id);

        Flash::success('El trabajador se eliminó correctamente.');

        return redirect(route('workers.index'));
    }
}
