<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'first_name',
        'last_name',
        'username',
        'email_verify',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'photo' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'username' => 'string',
        'email_verify' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getImageLink(){
        return asset('img/profils/'.$this->photo);
    }


    /**
     * Required for the WebDevEtc\BlogEtc package.
     * Enter your own logic (e.g. if ($this->id === 1) to
     *   enable this user to be able to add/edit blog posts
     *
     * @return bool - true = they can edit / manage blog posts,
     *        false = they have no access to the blog admin panel
     */
    public function canManageBlogEtcPosts()
    {
        // Enter the logic needed for your app.
        // Maybe you can just hardcode in a user id that you
        //   know is always an admin ID?

        if ($this->isAdmin() && $this->can('manag blog')){
           return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;
    }




    public function isAdmin(){
        return $this->hasRole('superadmin') || $this->hasRole('admin') ||
            $this->hasRole('blog manager') || $this->hasRole('wiki manager');
    }


    public static function initRolePermition(){

        $permission = Permission::create(['name' => 'create admin']);
        $permission = Permission::create(['name' => 'manag blog']);
        $permission = Permission::create(['name' => 'manag wiki']);


        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo('create admin');
        $role->givePermissionTo('manag blog');
        $role->givePermissionTo('manag wiki');


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('manag blog');
        $role->givePermissionTo('manag wiki');



        $role = Role::create(['name' => 'blog manager']);
        $role->givePermissionTo('manag blog');



        $role = Role::create(['name' => 'wiki manager']);
        $role->givePermissionTo('manag wiki');



        $role = Role::create(['name' => 'user']);
    }


    /**
     * @inheritDoc
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }



}
