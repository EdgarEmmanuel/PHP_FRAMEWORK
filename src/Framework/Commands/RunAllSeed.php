<?php
namespace Framework\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunAllSeed extends Command{
    protected static $defaultName = 'builder:run:seed';

    protected static $defaultDescription = 'Run all Seed';

    protected function configure(): void
    {
        $this
            ->setHelp('This is for running all seed');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $data = shell_exec('vendor/bin/phinx seed:run');
        $output->writeln($data);
        return Command::SUCCESS;
    }
}