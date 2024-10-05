<?php
namespace Fintreen\Payment\Model;

use Fintreen\Payment\Api\WebhookManagementInterface;
use Fintreen\Payment\Model\FintreenClient;
use Magento\Framework\Exception\LocalizedException;

class WebhookManagement implements WebhookManagementInterface
{
    protected $fintreenClient;

    public function __construct(FintreenClient $fintreenClient)
    {
        $this->fintreenClient = $fintreenClient;
    }

    public function processWebhook($data)
    {
        try {
            if (isset($data['transaction_id'])) {
                $transactionId = $data['transaction_id'];
                $this->fintreenClient->checkTransaction($transactionId);
                return json_encode(['success' => true, 'message' => 'Webhook processed successfully']);
            } else {
                throw new LocalizedException(__('Invalid webhook data'));
            }
        } catch (\Exception $e) {
            return json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}