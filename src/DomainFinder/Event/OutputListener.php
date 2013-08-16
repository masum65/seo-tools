<?php
namespace DomainFinder\Event;

class OutputListener
{
	public function __construct( \Symfony\Component\Console\Output\OutputInterface $output )
	{
		$this->output = $output;
	}

	public function getSubscribedEvents()
	{
		return array(
			'maxPageLimitReached',
			'found',
			'cantParseUrl'
		);
	}

	public function maxPageLimitReached( $params )
	{
		$this->output->writeln( "<error>Domain was not found: maximum google search page reached.</error>");
	}

	public function found( $params )
	{
		$this->output->writeln( "<question>Domain found in the position " . $params['number_of_results'] . ", in the page number " . $params['current_page'] . ".</question>");
	}

	public function cantParseUrl( $params )
	{
		$this->output->writeln( "<info>Can't read URL: " . $params['url'] . "</info>");
	}
}