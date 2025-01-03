# Etherscan Service
[![tests](https://github.com/slvler/etherscan-service/actions/workflows/tests.yml/badge.svg)](https://github.com/slvler/etherscan-service/actions/workflows/tests.yml)
[![Latest Stable Version](https://img.shields.io/packagist/v/slvler/ether.svg)](https://packagist.org/packages/slvler/ether)
[![License](https://poser.pugx.org/slvler/ether/license)](https://packagist.org/packages/slvler/ether)
[![Total Downloads](https://poser.pugx.org/slvler/ether/downloads)](https://packagist.org/packages/slvler/ether)

An api service for etherscan.io

## Requirements
- PHP 8.2
- Laravel 9.x | 10.x | 11.x

## Installation
To install this package tou can use composer:
```bash
composer require slvler/ether
```

## Usage
- First, you should extract the config/etherscan.php file to the config folder. 
```php
php artisan vendor:publish --tag=ether
```
- First of all we'll add the API key and API Url of the service we're using to our .env file of our project. If you don't have an account yet on api.etherscan.io, you should create one. Once you have an account you can copy your API key from the dashboard page and put it into you .env file.
```php
ETHERSCAN_BASE_URL=https://api.etherscan.io/
ETHERSCAN_API_KEY=YOUR-API-KEY
```
- This is how you can connect to the etherscan api service.
- Returns the Ether balance of a given address.
```php
$ether = new EtherScanService();
$ether->balance('0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae');
```
- Returns the balance of the accounts from a list of addresses.
```php
$data = [ 
    '0xddbd2b932c763ba5b1b7ae3b362eac3e8d40121a',
    '0x63a9975ba31b0b9626b34300f7f627147df1f526',
    '0x198ef1ec325a96cc354c7266a038be8b5c558f67'
];
$ether = new EtherScanService();
$ether->balance_multiple($data);
```
- Returns the list of transactions performed by an address, with optional pagination.
```php
$ether = new EtherScanService();
$ether->transactions_normal('0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae');
```
- Returns the list of internal transactions performed by an address, with optional pagination.
```php
$ether = new EtherScanService();
$ether->transactions_internal('0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae');
```
- Returns the list of internal transactions performed within a transaction.
```php
$ether = new EtherScanService();
$ether->transactions_internal_hash('0x40eb908387324f2b575b4879cd9d7188f69c8fc9d87c901b9e2daaea4b442170');
```
- Returns the list of internal transactions performed within a block range, with optional pagination.
```php
$ether = new EtherScanService();
$ether->transactions_internal_block_range();
```
- Returns the list of ERC-20 tokens transferred by an address, with optional filtering by token contract.
```php
$ether = new EtherScanService();
$ether->token_transfer_events_erc20();
```
- Returns the list of ERC-721 ( NFT ) tokens transferred by an address, with optional filtering by token contract.
```php
$ether = new EtherScanService();
$ether->token_transfer_events_erc721();
```
- Returns the list of ERC-1155 ( Multi Token Standard ) tokens transferred by an address, with optional filtering by token contract.
```php
$ether = new EtherScanService();
$ether->token_transfer_events_erc1155();
```
- Returns the list of blocks mined by an address.
```php
$ether = new EtherScanService();
$ether->address_blocks_mined();
```
- Returns the balance of an address at a certain block height. - PRO
```php
$ether = new EtherScanService();
$ether->balance_single_adress();
```

### Testing
```bash
composer test
```

## Credits
- [slvler](https://github.com/slvler)

## License
The MIT License (MIT). Please see [License File](https://github.com/slvler/etherscan-service/blob/main/LICENSE.md) for more information.

## Contributing
You're very welcome to contribute.
Please see [CONTRIBUTING](https://github.com/slvler/etherscan-service/blob/main/CONTRIBUTING.md) for details.
