<?php
namespace IstDrupalApp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NewSiteCommand extends Command {
  protected function configure() {
    $this->setName('new-site')
      ->setDescription('Create a new site')
      ->addArgument('site', InputArgument::REQUIRED, 'Site short name for the new site');
  }

  /**
   * {@inheritDoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $site_name = $input->getArgument('site');
    //$terminus_sites_create_cmd = "terminus sites create --product=\$product_uuid --name=$site_name --label=$site_name --org=\$organization_test_uuid";
    $terminus_sites_create_cmd = "terminus site info --site=$site_name";
    $output->writeln($terminus_sites_create_cmd);
    exec($terminus_sites_create_cmd, $out, $return);
    if ($return !== 0) {
      $output->writeln("Error in last command");
    }
    $output->writeln($out);

  }
}
