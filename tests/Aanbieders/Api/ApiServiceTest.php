<?php namespace Aanbieders\Api;


use Mockery;

class ApiServiceTest extends \PHPUnit_Framework_TestCase {

    const PRODUCT_ID = 236;

    const SUPPLIER_ID = 864;


    protected $params = null;


    public function setUp()
    {
        parent::setUp();

        $this->params = array(
            'sg'        => 'consumer',
            'cat'       => 'internet',
            'lang'      => 'nl'
        );
    }


    /**
     * @covers ApiService::getProducts()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetProducts()
    {
        $expectedResult = '[{"producttype":"internet","product_id":"8"},{"producttype":"internet","product_id":"27"}]';

        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProducts')->once()->with( $this->params, array() )->andReturn($expectedResult);
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $this->assertEquals( $expectedResult, $apiService->getProducts( $this->params ) );
    }

    /**
     * @covers ApiService::getProducts()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetProducts_limitsToProductIdsIfProvided()
    {
        $productIds = array( 8, 27 );

        $expectedResult = '[{"producttype":"internet","product_id":"8"},{"producttype":"internet","product_id":"27"}]';

        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProducts')->once()->with( $this->params, $productIds )->andReturn($expectedResult);
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $this->assertEquals( $expectedResult, $apiService->getProducts( $this->params, $productIds ) );
    }

    /**
     * @covers ApiService::getProducts()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetProducts_throwsExceptionIfApiReturnsError()
    {
        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProducts')->once()->with( $this->params, array() )->andReturn('Api error : parameter "cat" is required');
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $apiService->getProducts( $this->params );
    }

    /**
     * @covers ApiService::getProducts()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetProducts_throwsExceptionIfApiReturnsEmptyString()
    {
        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProducts')->once()->with( $this->params, array() )->andReturn('');
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $apiService->getProducts( $this->params );
    }


    /**
     * @covers ApiService::getProduct()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetProduct()
    {
        $expectedResult = '{"producttype":"internet","product_id":"8"}';

        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProduct')->once()->with( $this->params, self::PRODUCT_ID )->andReturn($expectedResult);
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $this->assertEquals( $expectedResult, $apiService->getProduct( $this->params, self::PRODUCT_ID ) );
    }

    /**
     * @covers ApiService::getProduct()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetProduct_throwsExceptionIfApiReturnsError()
    {
        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProduct')->once()->with( $this->params, self::PRODUCT_ID )->andReturn('Api error : parameter "cat" is required');
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $apiService->getProduct( $this->params, self::PRODUCT_ID );
    }

    /**
     * @covers ApiService::getProduct()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetProduct_throwsExceptionIfApiReturnsEmptyString()
    {
        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProduct')->once()->with( $this->params, self::PRODUCT_ID )->andReturn('');
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $apiService->getProduct( $this->params, self::PRODUCT_ID );
    }


    /**
     * @covers ApiService::getSuppliers()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetSuppliers()
    {
        $expectedResult = '[{"supplier_id":"8","name":"Foo"},{"supplier_id":"27","name":"Bar"}]';

        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSuppliers')->once()->with( $this->params, array() )->andReturn($expectedResult);
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $this->assertEquals( $expectedResult, $apiService->getSuppliers( $this->params ) );
    }

    /**
     * @covers ApiService::getSuppliers()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetSuppliers_limitsToSupplierIdsIfProvided()
    {
        $supplierIds = array( 8, 27 );

        $expectedResult = '[{"supplier_id":"8","name":"Foo"},{"supplier_id":"27","name":"Bar"}]';

        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSuppliers')->once()->with( $this->params, $supplierIds )->andReturn($expectedResult);
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $this->assertEquals( $expectedResult, $apiService->getSuppliers( $this->params, $supplierIds ) );
    }

    /**
     * @covers ApiService::getSuppliers()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetSuppliers_throwsExceptionIfApiReturnsError()
    {
        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSuppliers')->once()->with( $this->params, array() )->andReturn('Api error : parameter "cat" is required');
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $apiService->getSuppliers( $this->params );
    }

    /**
     * @covers ApiService::getSuppliers()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetSuppliers_throwsExceptionIfApiReturnsEmptyString()
    {
        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSuppliers')->once()->with( $this->params, array() )->andReturn('');
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $apiService->getSuppliers( $this->params );
    }


    /**
     * @covers ApiService::getSupplier()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetSupplier()
    {
        $expectedResult = '{"supplier_id":"36","name":"Belcenter"}';

        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSupplier')->once()->with( $this->params, self::SUPPLIER_ID )->andReturn($expectedResult);
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $this->assertEquals( $expectedResult, $apiService->getSupplier( $this->params, self::SUPPLIER_ID ) );
    }

    /**
     * @covers ApiService::getSupplier()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetSupplier_throwsExceptionIfApiReturnsError()
    {
        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSupplier')->once()->with( $this->params, self::SUPPLIER_ID )->andReturn('Api error : parameter "cat" is required');
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $apiService->getSupplier( $this->params, self::SUPPLIER_ID );
    }

    /**
     * @covers ApiService::getSupplier()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetSupplier_throwsExceptionIfApiReturnsEmptyString()
    {
        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSupplier')->once()->with( $this->params, self::SUPPLIER_ID )->andReturn('');
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $apiService->getSupplier( $this->params, self::SUPPLIER_ID );
    }


    /**
     * @covers ApiService::getComparisons()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetComparisons()
    {
        $expectedResult = '{"num_results":2,"comparison_id":21259054,"results":[{"product":{"producttype":"gas","product_id":"56"}}, {"product":{"producttype":"gas","product_id":"84"}}]}';

        $comparisonsServiceProviderMock = Mockery::mock('ComparisonServiceProvider');
        $comparisonsServiceProviderMock->shouldReceive('getComparisons')->once()->with( $this->params )->andReturn($expectedResult);
        $apiService = $this->createApiService(null, null, $comparisonsServiceProviderMock);

        $this->assertEquals( $expectedResult, $apiService->getComparisons( $this->params ) );
    }

    /**
     * @covers ApiService::getComparisons()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetComparisons_throwsExceptionIfApiReturnsError()
    {
        $comparisonsServiceProviderMock = Mockery::mock('ComparisonServiceProvider');
        $comparisonsServiceProviderMock->shouldReceive('getComparisons')->once()->with( $this->params )->andReturn('Api error : parameter "cat" is required');
        $apiService = $this->createApiService(null, null, $comparisonsServiceProviderMock);

        $apiService->getComparisons( $this->params );
    }

    /**
     * @covers ApiService::getComparisons()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetComparisons_throwsExceptionIfApiReturnsEmptyString()
    {
        $comparisonsServiceProviderMock = Mockery::mock('ComparisonServiceProvider');
        $comparisonsServiceProviderMock->shouldReceive('getComparisons')->once()->with( $this->params )->andReturn('');
        $apiService = $this->createApiService(null, null, $comparisonsServiceProviderMock);

        $apiService->getComparisons( $this->params );
    }

    /**
     * @covers ApiService::getComparisons()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetComparisons_throwsExceptionIfApiReturnsMissingParameterError()
    {
        $comparisonsServiceProviderMock = Mockery::mock('ComparisonServiceProvider');
        $comparisonsServiceProviderMock->shouldReceive('getComparisons')->once()->with( $this->params )->andReturn( '"Not all required parameters are set : Parameter \'sg\' is required"' );
        $apiService = $this->createApiService(null, null, $comparisonsServiceProviderMock);

        $apiService->getComparisons( $this->params );
    }

    /**
     * @covers ApiService::getComparisons()
     * @covers ApiService::returnIfSuccessful()
     * @expectedException Aanbieders\Api\Exceptions\AanbiedersApiException
     */
    public function testGetComparisons_throwsExceptionIfApiReturnsArrayOfMissingParameterErrors()
    {
        $comparisonsServiceProviderMock = Mockery::mock('ComparisonServiceProvider');
        $comparisonsServiceProviderMock->shouldReceive('getComparisons')->once()->with( $this->params )->andReturn( '["u is required (invalid numeric value)","zip is required (invalid zipcode value)"]' );
        $apiService = $this->createApiService(null, null, $comparisonsServiceProviderMock);

        $apiService->getComparisons( $this->params );
    }


    protected function createApiService($productServiceProvider, $supplierServiceProvider, $comparisonServiceProvider)
    {
        return new ApiService($productServiceProvider, $supplierServiceProvider, $comparisonServiceProvider);
    }

}