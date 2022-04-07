<?php
declare(strict_types=1);
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(\Dubas\EspoDevLib\ValueObject\Set\SetList::ESPOCRM);
};
