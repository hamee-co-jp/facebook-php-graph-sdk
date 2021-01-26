<?php

declare(strict_types=1);

/**
 * rectorphpによるコード管理された機械的な修正を利用する
 * originのSDKとの修正内容を追いやすくするために、 設定ファイルも一緒にコミットしGit管理する
 *
 * 以下のコマンドで実行する
 * docker run -v $(pwd):/project rector/rector:latest process /project/tests --config rector.php
 */

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    // Define what rule sets will be applied
    $parameters->set(Option::SETS, [
        SetList::PHP_70,
        SetList::PHP_71,
        SetList::PHP_72,
        SetList::PHP_73,
        SetList::PHP_74,
        SetList::PHP_80,
        SetList::PHPUNIT_60,
        SetList::PHPUNIT_70,
        SetList::PHPUNIT_75,
        SetList::PHPUNIT_80,
        SetList::PHPUNIT_90,
        SetList::PHPUNIT_91,
    ]);

    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
};
