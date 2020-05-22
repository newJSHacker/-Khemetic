<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 * @version February 10, 2019, 10:19 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 */
class User extends Model
{
    use SoftDeletes;
    use HasRoles;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $guard_name = 'web'; // or whatever guard you want to use


    public $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'remember_token',
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
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

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



}
