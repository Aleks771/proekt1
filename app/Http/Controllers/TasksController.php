<?php

namespace App\Http\Controllers;

use App\Repositories\TasksRepository;
use Illuminate\Http\Request;

class TasksController extends BaseController
{
    /**
     * Подключаем репозиторий
     * @var TasksRepository
     */

    private $TasksRepository;
    public function __construct()
    {
        $this->TasksRepository = app(TasksRepository::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = $this->TasksRepository->readZoho(); // Используем репозиторий "TasksRepository.php" (метод "readZoho")
        return view('tasksadminlte', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataform = $request->all();
        $status = $this->TasksRepository->recordZoho($dataform); //Используем репозиторий "TasksRepository.php" (метод "recordZoho")
        return view('storedminlte', compact('status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
