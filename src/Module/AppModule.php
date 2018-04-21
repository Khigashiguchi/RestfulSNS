<?php
namespace Khigashiguchi\RestfulSNS\Module;

use BEAR\Package\PackageModule;
use BEAR\Package\Provide\Router\AuraRouterModule;
use josegonzalez\Dotenv\Loader;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $appDir = dirname(__DIR__, 2);
        (new Loader($appDir . '/.env'))->parse()->toEnv();
        $this->install(new AuraRouterModule($appDir . '/var/conf/aura.route.php'));
        $this->install(new PackageModule);
        // Database
	    $dbConfig = 'sqlite:' . $appDir . '/var/db/sns.sqlite3';
	    $this->install(new AuraSqlModule($dbConfig));
    }
}
