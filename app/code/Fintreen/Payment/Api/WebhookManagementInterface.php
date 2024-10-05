<?php
namespace Fintreen\Payment\Api;

interface WebhookManagementInterface
{
    /**
     * Process the webhook request from Fintreen
     *
     * @param mixed $data
     * @return string
     */
    public function processWebhook($data);
}
