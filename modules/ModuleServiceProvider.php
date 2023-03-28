<?php
namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Commands\TestCommand;
use Modules\User\src\Http\Middlewares\DemoMiddleware;
use Modules\User\src\Repositories\UserRepository;

class ModuleServiceProvider extends ServiceProvider
{
    private $middlewares=[
        // 'demo'=> DemoMiddleware::class,
    ];
    private $commands=[
        // TestCommand::class,
    ];

    public function boot(){
        // $dir=File::directories(__DIR__);//lay folder hien tai
        //thong qua array_map lay basename
        $modules=$this->getModules();
        if(!empty($modules)){
            //neu ton tai folder trong module
            foreach($modules as $module)
            {
                $this->registerModules($module);
            }
        }
    }
    public function register()
    {
        $modules=$this->getModules();
        //Configs
        if(!empty($modules)){
            //neu ton tai folder trong module
            foreach($modules as $module)
            {
                $this->registerConfigs($module);
            }
        }

        // Middlaware
        $this->registerMiddlewares();
        // Commands
        $this->commands($this->commands);

        //repositories
        $this->app->singleton(
            \Modules\User\src\Repositories\UserRepositoryInterface::class,
            \Modules\User\src\Repositories\UserRepository::class,
                                \Modules\Category\src\Repositories\CategoryRepositoryInterface::class,
                                \Modules\Category\src\Repositories\CategoryRepository::class,


        );
    }
    public function registerModules($module)
    {
        $modulePath=__DIR__.'/'.$module;
        //khai bao cac thanh phan
        // dd($modulePath);

        //khai bao routes
        // dd(File::exists($modulePath. '/migrations'));
        if(File::exists($modulePath.'/routes/routes.php')){
            $this->loadRoutesFrom($modulePath.'/routes/routes.php');
        }
        //khai bao migrations
        if(File::exists($modulePath. '/migrations')){
            $this->loadMigrationsFrom($modulePath.'/migrations');
        }
        //khai bao languages

        if(File::exists($modulePath. '/resources/lang')){
            $this->loadTranslationsFrom($modulePath.'/resources/lang',$module);// file php
            $this->loadJsonTranslationsFrom($modulePath.'/resources/lang');
        }
        // khai bao view
        if(File::exists($modulePath. '/resources/views')){
            $this->loadViewsFrom($modulePath. '/resources/views',$module);
        }
        // khai bao helpers

        if(File::exists($modulePath. '/helpers'))
        {
            //tat ca file helpers
            $helperList=File::allFiles($modulePath.'/helpers');
            if(!empty($helperList))
            {
                foreach($helperList as $helper){
                    $file=$helper->getPathname();
                    require $file;
                }
            }
        }
    }
    private function getModules()
    {
        $directories=array_map('basename',File::directories(__DIR__));
        return $directories;
    }
    private function registerConfigs($module)
    {
        $configPath=__DIR__.'/'.$module.'/configs';
        if(File::exists($configPath)){
            $configFiles=array_map('basename',File::allFiles($configPath));
            foreach($configFiles as $config){
                $alias=basename($config,'.php');
                $this->mergeConfigFrom($configPath.'/'.$config,$alias);
            }
        }
    }
    private function registerMiddlewares()
    {
        if(!empty($this->middlewares))
        {
            foreach($this->middlewares as $key => $middleware)
            {
                $this->app['router']->pushMiddlewareToGroup($key,$middleware);
            }
        }
    }

}
