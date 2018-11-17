<?php
namespace Felideo\GTM;

class GTM {
	/**
	 * Returns the complete data layer and Google Tag Manager snippet. Inject in
	 * the container ID (GTM-XXXXX). Only the XXXXX part is required for injection.
	 * Creating the data layer and snippet this way stops any issues with data layer
	 * values being populated after the snippet is called.
	 *
	 * @param string $id Your container ID
	 *
	 * @return string
	 */
	public static function snippet($id)
	{
		return Controller::curr()->customise(array(
			'ID'   => $id,
			'Data' => GTMdata::getDataLayer()
		))->renderWith('TagManager');
	}
    /**
     * Set a dataLayer key value pair
     *
     * @param string $name  DataLayer var name
     * @param mixed  $value DataLayer var value
     * @return void
     */
    public static function data($name, $value)
    {
        GTMdata::pushData($name, $value);
    }
    /**
     * Push an event to the dataLayer
     *
     * @param string $name  The event name
     * @return void
     */
    public static function event($name)
    {
        GTMdata::pushEvent($name);
    }
    /**
     * Add the ecommerce transaction currency code
     *
     * @param string $code ISO 4217 format currency code e.g. EUR
     * @return void
     */
    public static function transactionCurrency($code)
    {
        GTMdata::pushTransactionCurrency($code);
    }
    /**
     * Record a product impression
     *
     * @param mixed $product An array of item fields
     * @return void
     */
    public static function productImpression($product)
    {
        GTMdata::pushProductImpression($product);
    }
    /**
     * Record a product impression in a promotional space
     *
     * @param mixed $product An array of item fields
     * @return void
     */
    public static function productPromoImpression($product)
    {
        GTMdata::pushProductPromoImpression($product);
    }
    /**
     * Record a product detail page
     *
     * @param mixed $product An array of item fields
     * @return void
     */
    public static function productDetail($product)
    {
        GTMdata::pushProductDetail($product);
    }
    /**
     * Record a product being added to the cart
     *
     * @param mixed $product An array of item fields
     * @return void
     */
    public static function addToCart($product)
    {
        GTMdata::pushAddToCart($product);
    }
    /**
     * Record a product being removed from the cart
     *
     * @param mixed $product An array of item fields
     * @return void
     */
    public static function removeFromCart($product)
    {
        GTMdata::pushRemoveFromCart($product);
    }
    /**
     * Add an ecommerce transaction
     *
     * @param array $fields An array of purchase fields
     * @return void
     */
    public static function purchase($fields)
    {
        GTMdata::pushPurchase($fields);
    }
    /**
     * Add an ecommerce transaction item
     * Used in conjunction with ->purchase()
     *
     * @param mixed $product An array of item fields
     * @return void
     */
    public static function purchaseItem($product)
    {
        GTMdata::pushPurchaseItem($product);
    }
    /**
     * Refund an ecommerce transaction
     *
     * @param string $id The id of the transaction to refund
     * @return void
     */
    public static function refundTransaction($id)
    {
        GTMdata::pushRefundTransaction($id);
    }
    /**
     * Refund an ecommerce transaction item
     *
     * @param string $id        The id of the transaction
     * @param string $productId The id of the item
     * @param int    $quantity  The quantity to refund
     * @return void
     */
    public static function refundItem($id, $productId, $quantity)
    {
        GTMdata::pushRefundTransactionItem($id, $productId, $quantity);
    }
}