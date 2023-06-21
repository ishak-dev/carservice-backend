use PHPUnit\Framework\TestCase;

class phpTests extends TestCase
{
    public function testGetAllOrders()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/order');
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    public function testGetOrderById()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/order/1'); // Replace 1 with a valid order ID
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    public function testGetUserOrders()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/orders/user');
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    

   
    public function testDeleteOrder()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->delete('http://localhost/order/1'); // Replace 1 with a valid order ID
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    
public function testUserLoginWithCorrectCredentials()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://localhost/userLogin', [
            'json' => [
                'email' => 'johndoe@example.com',
                'password' => '812483f'
            ]
        ]);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    public function testUserLoginWithIncorrectPassword()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://localhost/userLogin', [
            'json' => [
                'email' => 'johndoe@example.com',
                'password' => 'incorrectpassword'
            ]
        ]);
        
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
     public function testGetAllAppointments()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/appointment');
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
}
    
    public function testGetAppointmentById()
    {
        $appointmentId = 1; 
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/appointment/' . $appointmentId);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }

    
    public function testDeleteAppointment()
    {
        $appointmentId = 1; 
        $client = new \GuzzleHttp\Client();
        $response = $client->delete('http://localhost/appointment/' . $appointmentId);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    public function testGetAllCustomers()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/customer');
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    public function testGetCustomerById()
    {
        $customerId = 1;
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/customer/' . $customerId);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
    
    
    public function testDeleteCustomer()
    {
        $customerId = 1; // Replace with a valid customer ID
        $client = new \GuzzleHttp\Client();
        $response = $client->delete('http://localhost/customer/' . $customerId);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
   
}
