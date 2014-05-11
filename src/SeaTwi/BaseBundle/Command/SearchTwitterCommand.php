<?php
/**
 * Created by PhpStorm.
 * User: Data
 * Date: 11.05.14
 * Time: 20:28
 */

namespace SeaTwi\BaseBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SearchTwitterCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('SeaTwi:search')
            ->setDescription('Greet someone')
            ->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            ->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $logger LoggerInterface */
        $logger = $this->getContainer()->get('logger');


        $name = $input->getArgument('name');
        $translator = $this->getContainer()->get('translator');
        if ($name) {
            $output->writeln($translator->trans('Hello %name%!', array('%name%' => $name)));
        } else {
            $output->writeln($translator->trans('Hello!'));
        }
    }
}