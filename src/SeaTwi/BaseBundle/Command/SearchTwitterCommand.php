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
        $name = $input->getArgument('name');

        $twitterClient = $this->getContainer()->get('guzzle.twitter.client');
        //$status = $twitterClient->get('statuses/user_timeline.json')->send()->getBody();

        $_search = 'search/tweets.json?q=%23' . $name . '&result_type=mixed&count=4';
        $status = $twitterClient->get($_search)->send()->getBody();

        $oJsonObj = json_decode((string)$status);

        var_dump($oJsonObj);


        //$output->writeln($text);
    }
}