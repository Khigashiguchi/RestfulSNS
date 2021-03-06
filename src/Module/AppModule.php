<?php
namespace Khigashiguchi\RestfulSNS\Module;

use BEAR\Package\PackageModule;
use BEAR\Package\Provide\Router\AuraRouterModule;
use BEAR\Resource\Module\JsonSchemalModule;
use josegonzalez\Dotenv\Loader;
use Koriym\Now\NowModule;
use Koriym\QueryLocator\QueryLocatorModule;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\Di\AbstractModule;
use Ray\WebFormModule\AuraInputModule;
use Ray\WebFormModule\FormInterface;
use Khigashiguchi\RestfulSNS\Form\ArticleForm;

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
        $this->install(new NowModule);
        $this->install(new QueryLocatorModule($appDir . '/var/sql'));
        $this->install(new JsonSchemalModule($appDir . '/var/json_schema', $appDir . '/var/json_validate'));
        // Database
        $dbConfig = 'sqlite:' . $appDir . '/var/db/sns.sqlite3';
        $this->install(new AuraSqlModule($dbConfig));
        // Form
        $this->install(new AuraInputModule);
        $this->bind(ArticleForm::class);
        $this->bind(FormInterface::class)->annotatedWith('article_form')->to(ArticleForm::class);
        $this->install(new PackageModule);
    }
}
