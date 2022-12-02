<?php

namespace App\Providers;
use App\Http\Service\GatesDefine\PermissionGateAndPolicy;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissionGateAndPolicy = new PermissionGateAndPolicy();
        $permissionGateAndPolicy->setGateAndPolicyAccess();

//        Gate::define('category_list','App\Policies\CategoryPolicy@view');
//        Gate::define('category_add','App\Policies\CategoryPolicy@create');
//        Gate::define('category_edit','App\Policies\CategoryPolicy@update');
//        Gate::define('category_delete','App\Policies\CategoryPolicy@delete');
//
//        Gate::define('menus_list','App\Policies\MenuPolicy@view');
//        Gate::define('menus_add','App\Policies\MenuPolicy@create');
//        Gate::define('menus_edit','App\Policies\MenuPolicy@update');
//        Gate::define('menus_delete','App\Policies\MenuPolicy@delete');
//
//        Gate::define('product_list','App\Policies\ProductPolicy@view');
//        Gate::define('product_add','App\Policies\ProductPolicy@create');
//        Gate::define('product_edit','App\Policies\ProductPolicy@update');
//        Gate::define('product_delete','App\Policies\ProductPolicy@delete');
//
//        Gate::define('slider_list','App\Policies\SliderPolicy@view');
//        Gate::define('slider_add','App\Policies\SliderPolicy@create');
//        Gate::define('slider_edit','App\Policies\SliderPolicy@update');
//        Gate::define('slider_delete','App\Policies\SliderPolicy@delete');
//
//        Gate::define('setting_list','App\Policies\SettingPolicy@view');
//        Gate::define('setting_add','App\Policies\SettingPolicy@create');
//        Gate::define('setting_edit','App\Policies\SettingPolicy@update');
//        Gate::define('setting_delete','App\Policies\SettingPolicy@delete');
//
//        Gate::define('user_list','App\Policies\UserPolicy@view');
//        Gate::define('user_add','App\Policies\UserPolicy@create');
//        Gate::define('user_edit','App\Policies\UserPolicy@update');
//        Gate::define('user_delete','App\Policies\UserPolicy@delete');
//
//        Gate::define('role_list','App\Policies\RolePolicy@view');
//        Gate::define('role_add','App\Policies\RolePolicy@create');
//        Gate::define('role_edit','App\Policies\RolePolicy@update');
//        Gate::define('role_delete','App\Policies\RolePolicy@delete');

//        Gate::define('list_category', function ($user) {
//            return $user->checkPermissionAccess(config('permissions.access.category_list'));
//        });
//        Gate::define('list_menu', function ($user) {
//            return $user->checkPermissionAccess('menus_list');
//        });
//        Gate::define('list_user', function ($user) {
//            return $user->checkPermissionAccess('user_list');
//        });
    }
}
