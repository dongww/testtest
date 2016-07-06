<?php
use Command\Order\OrderCommand;
use Command\Order\OrderLine\OrderAttachement\OrderAttachementCommand;
use Command\Order\OrderLine\OrderLineCommand;
use Dddml\Command\CommandExecutor;
use Dddml\Command\CommandInterface;

require_once __DIR__ . '/bootstrap.php';

$orderId             = 'orderId001';
$orderLineId         = 'orderLineId001';
$orderAttachementsId = 'orderAttachementsId001';
$attachementTypeId   = 123;

$oa = new OrderAttachementCommand(CommandInterface::COMMAND_CREATE);

$oa->setCommandId('commandId001');
$oa->setRequesterId('requesterId001');
$oa->setOrderId($orderId);
$oa->setOrderLineId($orderLineId);
$oa->setId($orderAttachementsId);
$oa->setActive(true);
$oa->setAttachementTypeId($attachementTypeId);
$oa->setAttachementTypeName('attachementTypeName001');
$oa->setAttachementUrl('http://attachement.url');

$ol = new OrderLineCommand(CommandInterface::COMMAND_CREATE);
$ol->setCommandId('commandId001');
$ol->setRequesterId('requesterId001');
$ol->setId($orderLineId);
$ol->setOrderId($orderId);
$ol->setActive(true);
$ol->setProductId('productId001');
$ol->setPoProductNo('productNo001');
$ol->setProductName('productName001');
$ol->setAttributeSetInstanceId('attributeSetInstanceId001');
$ol->setSkuName('skuName001');
$ol->setQuantity(1.1);
$ol->setQuantityUomId('quantityUomId001');
$ol->setListPrice(1.0);
$ol->setListPriceUomId('listPriceUomId001');
$ol->setActualPrice(1.2);
$ol->setActualPriceUomId('actualPriceUomId001');
$ol->setOrganizationId('organizationId001');
$ol->setOrganizationName('organizationName001');
$ol->setLogisticalNo('logisticalNo001');
$ol->setStatus('status001');

$ol->setOrderAttachements([$oa]);

$order = new OrderCommand(CommandInterface::COMMAND_CREATE);
$order->setCommandId('commandId001');
$order->setRequesterId('requesterId001');
$order->setId($orderId);
$order->setActive(true);
$order->setOrderNo('orderNo001');
$order->setStatus(2);
$order->setDescription('description001');
$order->setIsPropertyActiveRemoved(true);

$order->addOrderLine($ol);

$executor = new CommandExecutor($baseUri);

$response = $executor->execute($order, [
    'parameters' => [
        'id' => $orderId,
    ],
]);

var_dump($response->getBody()->getContents());