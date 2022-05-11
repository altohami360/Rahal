<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::whereNotIn('name', [''])->get();
        return view('admin.users.index', compact('roles'));
    }
    
    public function data()
    {
        // dd($request()->role_id);
        $users = User::whenRoleId(request()->role_id);

        return DataTables::of($users)
            ->addColumn('record_select', 'admin.users.data_table.record_select')
            ->addColumn('roles', function (User $user) {
                return view('admin.users.data_table.roles', compact('user'));
            })
            ->addColumn('actions', 'admin.users.data_table.actions')
            ->rawColumns(['record_select', 'roles', 'actions'])
            ->toJson();

    }// end of data
    
    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $admin = User::FindOrFail($recordId);
            $this->delete($admin);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $exe = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $exe;

            $image->move(public_path('uploads/images/users') , $image_name);

        } else {
            $image_name = 'default.png';
        }
        
        $data['image'] = $image_name;


        
        $user = User::create($data);
        // dd($user);
        $user->attachRole($request->role_id);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));
        $user->syncRoles([$request->role_id]);
        
        
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        session()->flash('success', __('site.delete_successfully'));
        return redirect()->route('users.index');
    }
}
