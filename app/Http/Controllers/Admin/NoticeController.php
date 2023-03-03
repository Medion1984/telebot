<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{

    public function index()
    {
        $notices = Notice::all();

        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' =>'required|string'
        ]);

        Notice::create($request->all());
    
        return redirect()->route('notices.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $notice = Notice::find($id);

        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);

        $notice->update($request->all(['description']));

        return redirect()->route('notices.index');
    }

    public function destroy($id)
    {
        //
    }
}
