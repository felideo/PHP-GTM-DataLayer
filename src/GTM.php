<?php
namespace Felideo\GTM;

class GTM {
    private $gtm_code;

    public function getCode(){
        return ""
            . "<!-- Google Tag Manager -->"
            . "<script type='text/javascript'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':"
            . "new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],"
            . "j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src="
            . "'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);"
            . "})(window,document,'script','dataLayer','GTM-" . $this->gtm_code . "');</script>"
            . "<!-- End Google Tag Manager -->";
    }

    public function getNoscript(){
        return ""
            . '<!-- Google Tag Manager (noscript) -->'
            . '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-' . $this->gtm_code . '"'
            . 'height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>'
            . '<!-- End Google Tag Manager (noscript) -->';
    }

    public function set_gtm_code($gtm_code){
        $this->gtm_code = $gtm_code;
        return $this;
    }

    public static function render(){
        $datalayer = ''
            .  '<script type="text/javascript">'
            . ' dataLayer = dataLayer || []; '
            . GTMdata::getDataLayer()
            . ' </script>';


        return $datalayer;
    }

    public function data($name, $value){
        GTMdata::pushData($name, $value);
        return $this;
    }

    public function event($name){
        GTMdata::pushEvent($name);
        return $this;
    }

    public function transactionCurrency($code){
        GTMdata::pushTransactionCurrency($code);
        return $this;
    }

    /**
     * Record a product impression
     *
     * @since 1.0.0
     *
     * @param mixed $product An array of item fields
     *
     * @return void
     */
    public static function productImpression($product)
    {
        GTMdata::pushProductImpression($product);
    }
    /**
     * Record a product impression in a promotional space
     *
     * @since 1.0.0
     *
     * @param mixed $product An array of item fields
     *
     * @return void
     */
    public static function productPromoImpression($product)
    {
        GTMdata::pushProductPromoImpression($product);
    }
    /**
     * Record a product detail page
     *
     * @since 1.0.0
     *
     * @param mixed $product An array of item fields
     *
     * @return void
     */
    public static function productDetail($product)
    {
        GTMdata::pushProductDetail($product);
    }
    /**
     * Record a product being added to the cart
     *
     * @since 1.0.0
     *
     * @param mixed $product An array of item fields
     *
     * @return void
     */
    public static function addToCart($product)
    {
        GTMdata::pushAddToCart($product);
    }
    /**
     * Record a product being removed from the cart
     *
     * @since 1.0.0
     *
     * @param mixed $product An array of item fields
     *
     * @return void
     */
    public static function removeFromCart($product)
    {
        GTMdata::pushRemoveFromCart($product);
    }
    /**
     * Add an ecommerce transaction
     *
     * @since 1.0.0
     *
     * @param array $fields An array of purchase fields
     *
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
     * @since 1.0.0
     *
     * @param mixed $product An array of item fields
     *
     * @return void
     */
    public static function purchaseItem($product)
    {
        GTMdata::pushPurchaseItem($product);
    }
    /**
     * Refund an ecommerce transaction
     *
     * @since 1.0.0
     *
     * @param string $id The id of the transaction to refund
     *
     * @return void
     */
    public static function refundTransaction($id)
    {
        GTMdata::pushRefundTransaction($id);
    }
    /**
     * Refund an ecommerce transaction item
     *
     * @since 1.0.0
     *
     * @param string $id        The id of the transaction
     * @param string $productId The id of the item
     * @param int    $quantity  The quantity to refund
     *
     * @return void
     */
    public static function refundItem($id, $productId, $quantity)
    {
        GTMdata::pushRefundTransactionItem($id, $productId, $quantity);
    }

    public function debug(){

        return get_object_vars($this);
    }
}