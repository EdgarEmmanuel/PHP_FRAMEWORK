<?php
namespace Framework\Commands;


class Commands{
    public static function getCommands()
    {
        return [
            new MigrationCommand(),
            new RunCommand(),
            new RunAllMigrationCommand(),
            new MakeSeedCommand(),
            new RunAllSeed()
        ];
    }
}