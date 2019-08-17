<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Auth;
use Gate;
use DB;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(20);
        return view('permissions.index', compact('permissions'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        
        $permission = Permission::create($request->all());

        return redirect()
                ->route('permissions.index')
                ->with('success','Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit',compact('permission'));
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
        $permission = Permission::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $permission->update($request->all());

        return redirect()
                ->route('permissions.index')
                ->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()
                ->route('permissions.index')
                ->with('success','Permission deleted successfully');
    }

    public function get_by_module(Request $request)
    {
        $permissions = Permission::where('module_id', $request->all()['module_id'])->get();
        $selected_permissions = Permission::where('module_id', $request->all()['module_id'])
                                ->where('roles_permissions.role_id', $request->all()['role_id'])                        
                                ->join('roles_permissions','permissions.id','=','roles_permissions.permission_id')                        
                                ->get();
        //echo '<pre>';echo($selected_permissions[0]->name == $permissions[1]->name);die();
        $html = '';
        if (!empty($permissions)) {
            foreach($permissions as $permission){
                $html .= '<tr>
                            <td>'.$permission->name.'</td>
                            <td>'.$permission->slug.'</td>
                            <td><input id="permission_id" name="permission_id[]" value="'.$request->all()['role_id'].'+'.$permission->id.'" type="checkbox"'.($this->permission_exist($permission->id,$selected_permissions) ? ' checked' : '').'></td>
                        </tr>';
            }
        }
        return response()->json(['html' => $html]);
    }

    public function save_permissions(Request $request)
    {
        $html = 'Saved';
        if (!empty($request->all()['permission_id'])) {
            $this->delete_permissions(explode('+',$request->all()['permission_id'][0])[0]);
            foreach($request->all()['permission_id'] as $id){
                $role_id = explode('+',$id)[0];
                $permission_id = explode('+',$id)[1];
                DB::table('roles_permissions')->insert([
                    'role_id'      => $role_id,
                    'permission_id'=> $permission_id
                ]); 
            }
        }
        return response()->json(['html' => $html]);
    }

    private function delete_permissions($role_id){
        DB::table('roles_permissions')->where('role_id', '=', $role_id)->delete();
    }

    private function permission_exist($permission, $permissions){
        foreach($permissions as $p){
            if($p->id == $permission){
                return true;
            }
        }
        return false;
    }

}
