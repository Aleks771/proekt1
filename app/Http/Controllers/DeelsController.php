<?php

namespace App\Http\Controllers;

use App\Repositories\DeelsRepository;
use Illuminate\Http\Request;

class DeelsController extends BaseController
{
    /**
     * Подключаем репозиторий
     * @var DeelsRepository
     */

    private $DeelsRepository;
    public function __construct()
    {
        $this->DeelsRepository = app(DeelsRepository::class);
    }


    /**
     * Методы REST-контролера
     */
    public function index()
    {
        $kontragents = $this->DeelsRepository->readZoho(); // Используем репозиторий "DeelsRepository.php" (метод "readZoho")
        return view('deelsadminlte', compact('kontragents'));
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
        $status = $this->DeelsRepository->recordZoho($dataform); //Используем репозиторий "DeelsRepository.php" (метод "recordZoho")
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
