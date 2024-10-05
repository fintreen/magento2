# Magento 2 Fintreen Payment Module

## Overview

This module integrates the Fintreen crypto payment gateway with Magento 2, allowing customers to pay for orders using cryptocurrencies. It provides a seamless way to accept crypto payments in your Magento 2 store.

## Features

- Crypto payment option in checkout
- Configurable from Magento admin panel
- Webhook support for transaction updates
- Console command for checking transaction statuses

## Requirements

- Magento 2.3.x or higher
- PHP 7.3 or higher

## Installation

1. Create a directory for the module in your Magento installation:

   ```
   mkdir -p app/code/Fintreen/Payment
   ```

2. Clone this repository into the created directory:

   ```
   git clone https://github.com/your-username/magento2-fintreen-payment.git app/code/Fintreen/Payment
   ```

3. Enable the module:

   ```
   bin/magento module:enable Fintreen_Payment
   ```

4. Run Magento setup upgrade:

   ```
   bin/magento setup:upgrade
   ```

5. Compile Dependency Injection:

   ```
   bin/magento setup:di:compile
   ```

6. Clear the cache:

   ```
   bin/magento cache:clean
   ```

## Configuration

1. Log in to your Magento admin panel.
2. Navigate to Stores > Configuration > Sales > Payment Methods.
3. Find the "Fintreen Payment" section.
4. Configure the following settings:
    - Enable/Disable the payment method
    - Set the title to be displayed at checkout
    - Enter your Fintreen API token
    - Enter your Fintreen account email
    - Enable/Disable test mode

## Usage

Once configured, the Fintreen payment option will appear in the checkout process. Customers can select it to pay with cryptocurrencies.

### Webhook

The module provides a webhook endpoint at `/V1/fintreen/webhook`. Configure this URL in your Fintreen account to receive transaction status updates.

### Console Command

To manually check transaction statuses, use the following command:

```
bin/magento fintreen:check:transactions [--transaction_id=<id>]
```

Use the `--transaction_id` option to check a specific transaction, or omit it to check all pending transactions.

## Support

For issues, questions, or contributions, please open an issue in this repository or contact our support team.

## License

[MIT License](LICENSE.md)

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.