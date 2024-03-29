<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','slug'];

    public function users(){
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
     }

    public function hasAccess(array $permissions)
    {
        foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;
            }
        }
        return false;
    }

    protected function hasPermission(string $permission){
        $per = json_decode($this->permissions);
        return $per->$permission ?? false;
    }
}
