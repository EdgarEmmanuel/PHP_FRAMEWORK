<?php
namespace Framework\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeSeedCommand extends Command{
    protected static $defaultName = 'builder:seed';

    protected static $defaultDescription = 'create a Seeder';

    protected function configure(): void
    {
        $this
            ->setHelp('This is for generating a new seed')
            ->addArgument('seedName', InputArgument::REQUIRED, 'The seed name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $seedName = $input->getArgument('seedName');
        if($seedName){
            $data = shell_exec('vendor/bin/phinx seed:create ' . $seedName);
            $output->writeln($data);
            return Command::SUCCESS;
        } else {
            return Command::FAILURE;
        }
    }
}