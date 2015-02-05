<?php
namespace bwood\ConsoleApp\Command;

//use bwood\ConsoleApp\Greeter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NewSiteCommand extends Command {
  protected function configure() {
    $this->setName('new-site')
      ->setDescription('Create a new site')
      ->addOption('site', 's', InputOption::VALUE_REQUIRED, 'Site shortname for the new site');
  }

  /**
   * {@inheritDoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $site_name = $input->getOption('site');
    $terminus_sites_create_cmd = "terminus sites create --product=\$product_uuid --name=$site_name --label=$site_name --org=\$organization_test_uuid";
    $output->writeln($terminus_sites_create_cmd);

  }
}
