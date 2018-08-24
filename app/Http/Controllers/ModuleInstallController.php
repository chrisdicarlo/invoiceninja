<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\InstallModule;
use View;

class ModuleInstallController extends BaseController
{
    public function search(Request $request) {
        $moduleName = $request->input('module_name');

        if(!$moduleName) return null;

        $client = new \GuzzleHttp\Client();
        $packagist = new \Spatie\Packagist\Packagist($client);

        $package = $packagist->findPackageByName($moduleName);

        return View::make('partials.search_module_details')->
            with('name', $package['package']['name'])->
            with('description', $package['package']['description'])->
            with('repository', $package['package']['repository'])->render();
    }

    public function install(Request $request) {
        $moduleName = $request->input('module_name');

        $exitCode = \Artisan::call('module:install', ['name' => $moduleName, '--type' => 'github-https']);

        $returnData = array($moduleName, $exitCode, \Artisan::output());

        return $returnData;
    }
}
