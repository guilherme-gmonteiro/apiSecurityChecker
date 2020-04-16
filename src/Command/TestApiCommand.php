<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestApiCommand extends Command
{

    protected static $defaultName = "security:checker";

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {

        $this->setDescription("Check a api based on a Swagger YAML or JSON File");
        $this->setHelp("This command allows you to test a api based on a Swagger file, the output gives you tips to elevate the security of your api");
        $this->addArgument("jsonUrl", InputArgument::REQUIRED, 'THE Swagger YAML or JSON Path');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Welcome to Api Security Tester!!',
            '=============================================',
            '',
        ]);

        $output->writeln([
            'Begining Tests...',
        ]);

        $output->writeln("The URL path is:" . $input->getArgument("jsonUrl"));

        $swaggerdata = yaml_parse_file($input->getArgument("jsonUrl"));

        var_dump($swaggerdata);
    }

}