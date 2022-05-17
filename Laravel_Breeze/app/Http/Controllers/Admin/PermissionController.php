<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $permissions = Permission::all();

        return view('admin.index',compact('permissions'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:'.config('permission.table_names.permissions', 'permissions').',name',
        ]);

        $permission = new Permission();

        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        // dd($permission);
        $permission->save();

        return redirect()->route('admin.index')
            ->with('message','Permission created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //

        $permissions = Permission::all();
        // dd($permission);



        return view('admin.show', compact('permissions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission, $id)

    {
        $permission = Permission::find($id);

        return view('admin.edit',compact('permission'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255|unique:'.config('permission.table_names.permissions', 'permissions').',name,'.$permission->id,
        // ]);

        #
        $permissions = Permission::find($id);


        // $question->title = $request->input('title');
        // $question->description = $request->input('description');
        // $question->save();

        $permissions->update($request->all());

        return redirect()->route('admin.index')
                        ->with('message','Permission updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.index')
                        ->with('message','Permission deleted successfully');
    }

    /* Implementing tha access policies within the controller */

    function __construct()
    {
         $this->middleware('can:permission list', ['only' => ['index','show']]);
         $this->middleware('can:permission create', ['only' => ['create','store']]);
         $this->middleware('can:permission edit', ['only' => ['edit','update']]);
         $this->middleware('can:permission delete', ['only' => ['destroy']]);
    }
}
