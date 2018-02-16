<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

//use App\User;

class DocsSidebar
{
    public function handle(Request $request, Closure $next) {
        $request->attributes->add(['sidebarRoutes' => $this->getSidebarRoutes($request)]);
        return $next($request);
    }

    private function getSidebarRoutes(Request $request) {
        $routes = array();

        ///** @var User $user */
        //$user = $request->user();

        /*

        if( $user->hasAccess(['dashboard']) )   { $routes['dashboard'] = 'Dashboard';   }
        if( $user->hasAccess(['app-read'])  )   { $routes['app_list']   = 'Apps';       }
        if( $user->hasAccess(['data-read']) )   { $routes['data_list']  = 'Data';       }
        if( $user->hasAccess(['role-read']) )   { $routes['role_list']  = 'Roles';      }
        if( $user->hasAccess(['user-read']) )   { $routes['user_list']  = 'Users';      }

        */

        $routes['docs_home'] = 'Home';

        return $routes;
    }
}
