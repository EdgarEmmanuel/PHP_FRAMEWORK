<?php
namespace Framework\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunAllMigrationCommand extends Command{
    protected static $defaultName = 'builder:migrate';

    protected static $defaultDescription = 'Run All The Available migrations';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $response = shell_exec('vendor/bin/phinx migrate');
        $output->writeln($response);
        return Command::SUCCESS;
    }
}