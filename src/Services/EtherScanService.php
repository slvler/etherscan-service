<?php

namespace slvler\ether\Services;

use slvler\ether\Resources\Balance;

class EtherScanService
{
    private $base_url;
    private $api_key;
    private $client;

    public function __construct()
    {
        $this->base_url = config('etherscan.ether.etherscan_url');
        $this->api_key = config('etherscan.ether.etherscan_key');

        $this->client = new \GuzzleHttp\Client(
            ['base_uri' => $this->base_url]
        );
    }

    public function balance($adress): Balance
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'balance',
                    'address' => $adress,
                    'tag' => 'latest',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                return new Balance(json_decode($res->getBody()->getContents()));
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function balance_multiple($data = [])
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'balancemulti',
                    'address' => implode(',', $data),
                    'tag' => 'latest',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function transactions_normal($adress)
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'txlist',
                    'address' => $adress,
                    'startblock' => '0',
                    'endblock' => '99999999',
                    'page' => '1',
                    'offset' => '10',
                    'sort' => 'asc',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function transactions_internal($adress)
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'txlistinternal',
                    'address' => $adress,
                    'startblock' => '0',
                    'endblock' => '99999999',
                    'page' => '1',
                    'offset' => '10',
                    'sort' => 'asc',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function transactions_internal_hash($txhash)
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'txlistinternal',
                    'txhash' => $txhash,
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function transactions_internal_block_range()
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'txlistinternal',
                    'startblock' => '13481773',
                    'endblock' => '13491773',
                    'page' => '1',
                    'offset' => '10',
                    'sort' => 'asc',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function token_transfer_events_erc20()
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'tokentx',
                    'contractaddress' => '0x9f8f72aa9304c8b593d555f12ef6589cc3a579a2',
                    'address' => '0x4e83362442b8d1bec281594cea3050c8eb01311c',
                    'page' => '1',
                    'offset' => '10',
                    'startblock' => '0',
                    'endblock' => '27025780',
                    'sort' => 'asc',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function token_transfer_events_erc721()
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'tokennfttx',
                    'contractaddress' => '0x06012c8cf97bead5deae237070f9587f8e7a266d',
                    'address' => '0x6975be450864c02b4613023c2152ee0743572325',
                    'page' => '1',
                    'offset' => '100',
                    'startblock' => '0',
                    'endblock' => '27025780',
                    'sort' => 'asc',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function token_transfer_events_erc1155()
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'token1155tx',
                    'contractaddress' => '0x76be3b62873462d2142405439777e971754e8e77',
                    'address' => '0x83f564d180b58ad9a02a449105568189ee7de8cb',
                    'page' => '1',
                    'offset' => '100',
                    'startblock' => '0',
                    'endblock' => '99999999',
                    'sort' => 'asc',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function address_blocks_mined()
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'getminedblocks',
                    'address' => '0x9dd134d14d1e65f84b706d6f205cd5b1cd03a46b',
                    'blocktype' => 'blocks',
                    'page' => '1',
                    'offset' => '10',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }

    public function balance_single_adress()
    {
        try {
            $res = $this->client->request('GET', 'api', [
                'query' => [
                    'module' => 'account',
                    'action' => 'balancehistory',
                    'address' => '0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae',
                    'blockno' => '8000000',
                    'apikey' => $this->api_key,
                ],
            ]);
            $statuscode = $res->getStatusCode();
            if ($statuscode == 200) {
                $content = $res->getBody()->getContents();

                return $content;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();

            return $response;
        }
    }
}
