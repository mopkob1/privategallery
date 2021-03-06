<?php
$em = $app['orm.em'];

$helpers= new Symfony\Component\Console\Helper\HelperSet(array(
        'db' => new Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
        'em' => new Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
    )
);

$commands=array(
    // DBAL Commands
    new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand(),
    new \Doctrine\DBAL\Tools\Console\Command\ImportCommand(),
    // own Commands
    new ownCommands\toCreateEntities(),
    new ownCommands\toReadEntities(),
    new ownCommands\OTObiCreate(),
    new ownCommands\OTObiRead(),
    new ownCommands\OTOuniCreate(),
    new ownCommands\OTOuniRead(),
    new ownCommands\OTMbiCreate(),
    new ownCommands\OTMbiRead(),
    new ownCommands\MTMbiCreate(),
    new ownCommands\MTMbiRead(),
    new ownCommands\asovrCreate(),
    new ownCommands\asovrRead(),

    // ORM Commands

    new Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
    new Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
    new Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
    new Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
    new Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
    new Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(),
    new Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
    new Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
    new Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
    new Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
    new Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
    new Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand(),

);