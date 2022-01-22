<?php
namespace Framework\Commands;


class Commands{
    public static function getCommands()
    {
        return [
            new \Framework\Commands\MigrationCommand()
        ];
    }
}