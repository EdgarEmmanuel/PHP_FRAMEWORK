<?php
namespace Framework\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationCommand extends Command {

    protected static $defaultName = 'builder:migration';

    protected static $defaultDescription = 'Show Galsen Dev';

    protected function configure(): void
    {
        $this
            ->setHelp('This Show Galsen Dev')
            ->addArgument('migrationName', InputArgument::REQUIRED, 'The migration name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        $migrationName = $input->getArgument('migrationName');
        $data = shell_exec('vendor/bin/phinx create ' . $migrationName);
        $output->writeln($data);
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }

}
