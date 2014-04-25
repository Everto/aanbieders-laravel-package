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
        $expectedResult = array(
            'Foo'       => 'Bar'
        );

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
        $productIds = array( 15, 23, 46, 89 );

        $expectedResult = array(
            'Foo'       => 'Bar'
        );

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
    public function testGetProducts_throwsExceptionIfApiReturnsNull()
    {
        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProducts')->once()->with( $this->params, array() )->andReturn(null);
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $apiService->getProducts( $this->params );
    }


    /**
     * @covers ApiService::getProduct()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetProduct()
    {
        $expectedResult = new \stdClass();

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
    public function testGetProduct_throwsExceptionIfApiReturnsNull()
    {
        $productServiceProviderMock = Mockery::mock('ProductServiceProvider');
        $productServiceProviderMock->shouldReceive('getProduct')->once()->with( $this->params, self::PRODUCT_ID )->andReturn(null);
        $apiService = $this->createApiService($productServiceProviderMock, null, null);

        $apiService->getProduct( $this->params, self::PRODUCT_ID );
    }


    /**
     * @covers ApiService::getSuppliers()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetSuppliers()
    {
        $expectedResult = array(
            'Foo'       => 'Bar'
        );

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
        $supplierIds = array( 15, 23, 46, 89 );

        $expectedResult = array(
            'Foo'       => 'Bar'
        );

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
    public function testGetSuppliers_throwsExceptionIfApiReturnsNull()
    {
        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSuppliers')->once()->with( $this->params, array() )->andReturn(null);
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $apiService->getSuppliers( $this->params );
    }


    /**
     * @covers ApiService::getSupplier()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetSupplier()
    {
        $expectedResult = new \stdClass();

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
    public function testGetSupplier_throwsExceptionIfApiReturnsNull()
    {
        $supplierServiceProviderMock = Mockery::mock('SupplierServiceProvider');
        $supplierServiceProviderMock->shouldReceive('getSupplier')->once()->with( $this->params, self::SUPPLIER_ID )->andReturn(null);
        $apiService = $this->createApiService(null, $supplierServiceProviderMock, null);

        $apiService->getSupplier( $this->params, self::SUPPLIER_ID );
    }


    /**
     * @covers ApiService::getComparisons()
     * @covers ApiService::returnIfSuccessful()
     */
    public function testGetComparisons()
    {
        $expectedResult = array(
            'Foo'       => 'Bar'
        );

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
    public function testGetComparisons_throwsExceptionIfApiReturnsNull()
    {
        $comparisonsServiceProviderMock = Mockery::mock('ComparisonServiceProvider');
        $comparisonsServiceProviderMock->shouldReceive('getComparisons')->once()->with( $this->params )->andReturn(null);
        $apiService = $this->createApiService(null, null, $comparisonsServiceProviderMock);

        $apiService->getComparisons( $this->params );
    }


    protected function createApiService($productServiceProvider, $supplierServiceProvider, $comparisonServiceProvider)
    {
        return new ApiService($productServiceProvider, $supplierServiceProvider, $comparisonServiceProvider);
    }

}