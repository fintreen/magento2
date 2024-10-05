<?php
namespace Fintreen\Payment\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\HTTP\Client\Curl;

class FintreenClient
{
    protected $scopeConfig;
    protected $curl;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Curl $curl
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->curl = $curl;
    }

    public function checkTransaction($transactionId)
    {
        $token = $this->scopeConfig->getValue('payment/fintreen/token');
        $email = $this->scopeConfig->getValue('payment/fintreen/email');
        $isTestMode = $this->scopeConfig->getValue('payment/fintreen/test_mode');

        $url = 'https://fintreen.com/api/v1/check';
        $params = [
            'orderId' => $transactionId,
            'isTest' => $isTestMode ? 1 : 0
        ];

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
            'fintreen_auth: ' . $token,
            'fintreen_signature: ' . sha1($token . $email)
        ];

        $this->curl->setHeaders($headers);
        $this->curl->get($url . '?' . http_build_query($params));

        $response = json_decode($this->curl->getBody(), true);

        // Process the response and update the local transaction status
        // You'll need to implement this part based on your specific requirements
    }
}