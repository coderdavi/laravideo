<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Model\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TagController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data = Tag::get();
        return view('admin.tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $model
     * @return RedirectResponse|Redirector
     */
    public function store(TagRequest $request, Tag $model)
    {
        Tag::query()->create($request->all());
//        $model->create($request->all());

        return redirect('admin/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $model = Tag::query()->find($id);
        return view('admin.tag.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $model = Tag::query()->find($id);
        $model['name'] = $request['name'];
        $model->save();
        return redirect('/admin/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return $this->success('删除成功');
    }
}
