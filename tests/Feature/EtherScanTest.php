<?php

namespace Slvler\Ether\Tests\Feature;

use Slvler\Ether\Services\EtherScanService;
use Slvler\Ether\Tests\TestCase;

class EtherScanTest extends TestCase
{
    /**
     * @test
     */
    public function test_balance()
    {
        $ether = new EtherScanService();
        $this->assertIsObject($ether->balance('0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae'));
    }

    /**
     * @test
     */
    public function test_balance_multiple()
    {
        $ether = new EtherScanService();
        $data = ['0xddbd2b932c763ba5b1b7ae3b362eac3e8d40121a', '0x63a9975ba31b0b9626b34300f7f627147df1f526', '0x198ef1ec325a96cc354c7266a038be8b5c558f67'];
        $this->assertJson($ether->balance_multiple($data));
    }

    /**
     * @test
     */
    public function test_transactions_normal()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->transactions_normal('0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae'));
    }

    /**
     * @test
     */
    public function test_transactions_internal()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->transactions_internal('0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae'));
    }

    /**
     * @test
     */
    public function test_transactions_internal_hash()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->transactions_internal_hash('0x40eb908387324f2b575b4879cd9d7188f69c8fc9d87c901b9e2daaea4b442170'));
    }

    /**
     * @test
     */
    public function test_transactions_internal_block_range()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->transactions_internal_block_range());
    }

    /**
     * @test
     */
    public function test_token_transfer_events_erc20()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->token_transfer_events_erc20());
    }

    /**
     * @test
     */
    public function test_token_transfer_events_erc721()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->token_transfer_events_erc721());
    }

    /**
     * @test
     */
    public function test_token_transfer_events_erc1155()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->token_transfer_events_erc1155());
    }

    /**
     * @test
     */
    public function test_address_blocks_mined()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->address_blocks_mined());
    }

    /**
     * @test
     */
    public function test_balance_single_adress()
    {
        $ether = new EtherScanService();
        $this->assertJson($ether->balance_single_adress());
    }
}
