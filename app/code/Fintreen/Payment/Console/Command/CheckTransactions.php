<?php
namespace Fintreen\Payment\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Fintreen\Payment\Model\FintreenClient;
use Magento\Framework\App\State;

class CheckTransactions extends Command
{
    protected $fintreenClient;
    protected $state;

    public function __construct(FintreenClient $fintreenClient, State $state)
    {
        $this->fintreenClient = $fintreenClient;
        $this->state = $state;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('fintreen:check:transactions')
            ->setDescription('Check Fintreen transactions')
            ->addOption('transaction_id', null, InputOption::VALUE_OPTIONAL, 'Check specific transaction ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_ADMINHTML);

            $transactionId = $input->getOption('transaction_id');

            if ($transactionId) {
                $this->fintreenClient->checkTransaction($transactionId);
                $output->writeln("Checked transaction: " . $transactionId);
            } else {
                // Implement logic to check all pending transactions
                $output->writeln("Checking all pending transactions...");
                // You'll need to implement this part
            }

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }
    }
}