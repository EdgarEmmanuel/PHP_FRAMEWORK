<?php
namespace Framework\Commands;


class Commands{
    public static function getCommands()
    {
        return [
            new MigrationCommand(),
            new RunCommand()
        ];
    }
}