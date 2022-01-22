<?php
namespace Framework\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command{
    protected static $defaultName = 'run';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        exec('php -S localhost:9000 -t public/');
        //$output->writeln($data);
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}