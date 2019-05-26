<?php

namespace App\Repositories\Interfaces;


interface IEmployeeRepository
{
    public function index();

    public function create();

    public function store($request);

    public function show();

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}