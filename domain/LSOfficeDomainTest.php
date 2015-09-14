<?php
require_once('LSOfficeDomain.php');

class CRMTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }

    public function testCreateCustomer()
    {
        new Client(2, 'Alex Mbaka','0727596626', 'alex@qet.co.ke','Suite 602, Marafique Arcade. Kenyatta Avenue', 'Thika, KIAMBU', 'Kenya');
		$this->assertInstanceOf('Party', Client::GetParty(2));
    }

    public function testEditCustomer()
    {
        Client::Update(2, 'Alex Mbaka','0727596600', 'alex@qet.co.ke','Suite 602, Marafique Arcade. Kenyatta Avenue');
		$client = Client::GetParty(2);
		$this->assertInstanceOf('Party', $client);
		$this->assertTrue($client->telephone == '0727596600');
    }

    public function testGetAllClients()
    {
        $clients = Client::GetRegister();
        $this->assertTrue(count($clients) == 2);
    }

    public function testGetAllClientsWithLastEncounter()
    {
        
    }

    public function testLogEnquiry()
    {
 		$stamp = 20150818110533;
 		$date = '18/08/2015';
        $enq = new Enquiry('Alex Mbaka','0727596626', 'Topocadastral Survey, Engineering Survey','In my plot', $date, $stamp);
        $enq->persist();
		$this->assertInstanceOf('Enquiry', Enquiry::GetEnquiry($stamp));

    }

    public function testCheckEnquiry()
    {
 		$stamp = 20150818102512;
 		$date = '18/08/2015';
        $enq = new Enquiry('Robert Mbabu','0720563214', 'Fixed Boundary Survey','In my plot', $date, $stamp);
        $enq->persist();
        Enquiry::Check($stamp);
        $enquiry = Enquiry::GetEnquiry($stamp);
		$this->assertInstanceOf('Enquiry', $enquiry);
		$this->assertTrue($enquiry->status == 0);
    }

    public function testGetPendingEnquiries()
    {
        $enquiries = Enquiry::GetPending();
        $this->assertTrue(count($enquiries) == 1);
    }
}

class OperationsTest extends PHPUnit_Framework_TestCase
{	
    public function setUp(){ }
    public function tearDown(){ }

    public function testGetWholeCatalog()
    {
        // test to ensure that the object from an fsockopen is valid
        $catalogObjs = StockInventory::GetInventory();
        $this->assertTrue(count($catalogObjs) == 39);
   }

    public function testBuyingProcess() {
	  	/*var sale = new Accountability.ConnectedAccountabilityType('SaleAgreement');
		var seller = new Accountability.PartyType('Vendor');
		var buyer = new Accountability.PartyType('Customer');
		sale.addConnectionRule(buyer, seller);
		var alex = new Accountability.Party("Alex Mbaka", buyer);
	        var pablo = new Accountability.Party("Pablo Gift Shop", seller);
		accountabilityInstances.push(Accountability.Accountability.create(alex, pablo, sale));*/
		/*$sale = new ConnectedAccountabilityType('SaleAgreement');*/
	 	
	 	//oR this which is a more specialized version that defines party and party type in one process



		$ii = StockInventory::GetItem(15);
		$ii2 = StockInventory::GetItem(25);
		//from view model
		$this->assertInstanceOf('StockAccount', $ii);

		$orderItem = OrderLine::Create(ShoppingSession::GetOrderId(), $ii->item->itemId, $ii->item->name, 2, $ii->taxcode, $ii->retail_price, $ii->cost_price, 0);
		$orderItem2 = OrderLine::Create(ShoppingSession::GetOrderId(), $ii2->item->itemId, $ii2->item->name, 1, $ii2->taxcode, $ii2->retail_price, $ii2->cost_price, 0);
		//$catalogObj = Catalog::GetCatalogItem('ID345625'); gets item category too
		//static variables initialized on init
		ShoppingSession::AddToTestCart($orderItem);//date and time
		ShoppingSession::AddToTestCart($orderItem2);
		//adds order item to the sale agreement particulars
		//reduce goods for sale temporarily
		#### WHEN THE USER POSTS SHOPPING DETAILS - i.e. customer, shopping order, and recepient of goods
		$sale = new SimpleSaleAccountability();
		$customer = new Customer(2, 'Alex Mbaka','0727596626', 'alex@qet.co.ke','Suite 602, Marafique Arcade. Kenyatta Avenue', 'Thika, KIAMBU', 'Kenya');
		$vendor = Vendor::GetVendor();//Pablo Gift Shop
		//Opens New (Obligations account and) Income/Expenditure Account
		//Links to party account
		$sale->setBuyer($customer);// -- vendor is automatically set
		$sale->setSeller($vendor);
		$cart = ShoppingSession::CompleteSession();
		//for simple sales
		$sale->initialize($cart->order);
		//$sale->addOrder($cart->order); -- for more complex sales
		#DEFERRED ORDERING - ADD TO WISH LIST
		//$customer->addToWishList($sale->order);
		$customer->authorizeOrder($sale->order);
		//generates invoice by communicating with the transaction core
		//client object receives new Invoice 
		$amount = new Money('35040.00', Currency::Get('KES'));//new Quantity('number', 'unit')
		//$signature = new Signature('Name/email','Password/Identification/SessionID');
		$payment = new PaypalPayment('Email', 'REFERENCES', $amount);
		//$payment = new Payment('Customer', 'STATIC Vendor', $amount, $paymentmethod);
		//$destination = new Location('Name of Building', 'Town', 'County', 'Country', 'Physical Address/Closest road and or stage', 'Area Code', 'Latitude', 'Longitude');
		//$paymentmethod->authorizePayment($payee, $amount);

		//verify name and identification/password is the same as that in client record/session
		//when singleton object is in use there is a status property thats either busy or ready
		//generate invoive then get it
		//$invoice = $sale->getInvoice();
		if ($sale->getInvoice()) {
			$receipt = $customer->makePayment($sale->invoice, $payment);
			$this->assertInstanceOf('Receipt', $receipt);
		}
		
		//move money to sales revenue account with timestamp to map values on graph
		//client receives receipt via observer mechanism i.e call on receivereceipt method on the client object that is configured to send emails on demand
		

		//assert balance history that the client has been billed and revenues have been received
		$this->assertInstanceOf('Accountability', $sale);

		//throw new Exception("That's not a server name!");
    }
}

class AccountsTest extends PHPUnit_Framework_TestCase
{	
    public $account;
    public function setUp(){ }
    public function tearDown(){ }

    public function testGetWholeCatalog()
    {
        // test to ensure that the object from an fsockopen is valid
        $catalogObjs = StockInventory::GetInventory();
        $this->assertTrue(count($catalogObjs) == 39);
   }

    public function testBuyingProcess() {
	  	/*var sale = new Accountability.ConnectedAccountabilityType('SaleAgreement');
		var seller = new Accountability.PartyType('Vendor');
		var buyer = new Accountability.PartyType('Customer');
		sale.addConnectionRule(buyer, seller);
		var alex = new Accountability.Party("Alex Mbaka", buyer);
	        var pablo = new Accountability.Party("Pablo Gift Shop", seller);
		accountabilityInstances.push(Accountability.Accountability.create(alex, pablo, sale));*/
		/*$sale = new ConnectedAccountabilityType('SaleAgreement');*/
	 	
	 	//oR this which is a more specialized version that defines party and party type in one process



		$ii = StockInventory::GetItem(15);
		$ii2 = StockInventory::GetItem(25);
		//from view model
		$this->assertInstanceOf('StockAccount', $ii);

		$orderItem = OrderLine::Create(ShoppingSession::GetOrderId(), $ii->item->itemId, $ii->item->name, 2, $ii->taxcode, $ii->retail_price, $ii->cost_price, 0);
		$orderItem2 = OrderLine::Create(ShoppingSession::GetOrderId(), $ii2->item->itemId, $ii2->item->name, 1, $ii2->taxcode, $ii2->retail_price, $ii2->cost_price, 0);
		//$catalogObj = Catalog::GetCatalogItem('ID345625'); gets item category too
		//static variables initialized on init
		ShoppingSession::AddToTestCart($orderItem);//date and time
		ShoppingSession::AddToTestCart($orderItem2);
		//adds order item to the sale agreement particulars
		//reduce goods for sale temporarily
		#### WHEN THE USER POSTS SHOPPING DETAILS - i.e. customer, shopping order, and recepient of goods
		$sale = new SimpleSaleAccountability();
		$customer = new Customer(2, 'Alex Mbaka','0727596626', 'alex@qet.co.ke','Suite 602, Marafique Arcade. Kenyatta Avenue', 'Thika, KIAMBU', 'Kenya');
		$vendor = Vendor::GetVendor();//Pablo Gift Shop
		//Opens New (Obligations account and) Income/Expenditure Account
		//Links to party account
		$sale->setBuyer($customer);// -- vendor is automatically set
		$sale->setSeller($vendor);
		$cart = ShoppingSession::CompleteSession();
		//for simple sales
		$sale->initialize($cart->order);
		//$sale->addOrder($cart->order); -- for more complex sales
		#DEFERRED ORDERING - ADD TO WISH LIST
		//$customer->addToWishList($sale->order);
		$customer->authorizeOrder($sale->order);
		//generates invoice by communicating with the transaction core
		//client object receives new Invoice 
		$amount = new Money('35040.00', Currency::Get('KES'));//new Quantity('number', 'unit')
		//$signature = new Signature('Name/email','Password/Identification/SessionID');
		$payment = new PaypalPayment('Email', 'REFERENCES', $amount);
		//$payment = new Payment('Customer', 'STATIC Vendor', $amount, $paymentmethod);
		//$destination = new Location('Name of Building', 'Town', 'County', 'Country', 'Physical Address/Closest road and or stage', 'Area Code', 'Latitude', 'Longitude');
		//$paymentmethod->authorizePayment($payee, $amount);

		//verify name and identification/password is the same as that in client record/session
		//when singleton object is in use there is a status property thats either busy or ready
		//generate invoive then get it
		//$invoice = $sale->getInvoice();
		if ($sale->getInvoice()) {
			$receipt = $customer->makePayment($sale->invoice, $payment);
			$this->assertInstanceOf('Receipt', $receipt);
		}
		
		//move money to sales revenue account with timestamp to map values on graph
		//client receives receipt via observer mechanism i.e call on receivereceipt method on the client object that is configured to send emails on demand
		

		//assert balance history that the client has been billed and revenues have been received
		$this->assertInstanceOf('Accountability', $sale);

		//throw new Exception("That's not a server name!");
    }
}
?>


