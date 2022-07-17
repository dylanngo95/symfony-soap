<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:soap',
    description: 'Call soap api',
)]
class SoapCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('age', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');

        if ($name) {
            $io->note(sprintf('You passed an argument: %s', $name));
        }

        if ($input->getOption('age')) {
        }

        $soapClient = new \SoapClient('http://localhost:8000/index.php/soap?wsdl');
        $result = $soapClient->__soapCall('hello', ['name' => $name]);
        $output->writeln($result);

        $io->success('Call to soap done.');

        return Command::SUCCESS;
    }
}
