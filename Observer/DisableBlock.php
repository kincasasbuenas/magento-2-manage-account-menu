<?php
/**
 * Copyright (c) 2024 - Kevin casasbuenas (https://kincasasbuenas.dev/)
 * @author      Kevin Casasbuenas <kincasasbuenas@outlook.com>
 * @category    Kinuz
 * @module      Kinuz/ManageAccountMenu
 */

declare(strict_types=1);

namespace Kinuz\ManageAccountMenu\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 *  class disable block
 */
class DisableBlock implements ObserverInterface
{
    const XML_PATH_IS_ENABLED = 'manage_account_menu/general/enabled';

    const XML_PATH_DISABLE_BLOCK_ACCOUNT_LINK = 'manage_account_menu/general/active_account_link';

    const XML_PATH_DISABLE_BLOCK_DELIMITER_1 = 'manage_account_menu/general/active_delimiter_1';

    const XML_PATH_DISABLE_BLOCK_DELIMITER_2 = 'manage_account_menu/general/active_delimiter_2';

    const XML_PATH_DISABLE_BLOCK_ADDRESS_LINK = 'manage_account_menu/general/active_address_link';

    const XML_PATH_DISABLE_BLOCK_ACCONT_EDIT_LINK = 'manage_account_menu/general/active_account_edit_link';

    const XML_PATH_DISABLE_BLOCK_DOWNLOADABLE_PRODUCTS_LINK = 'manage_account_menu/general/active_downloadable_products_link';

    const XML_PATH_DISABLE_BLOCK_NEWSLETTER_SUBSCRIPTIONS_LINK = 'manage_account_menu/general/active_newsletter_subscriptions_link';

    const XML_PATH_DISABLE_BLOCK_BILLING_AGREEMENTS_LINK = 'manage_account_menu/general/active_billing_agreements_link';

    const XML_PATH_DISABLE_BLOCK_PRODUCT_REVIEWS_LINK = 'manage_account_menu/general/active_product_reviews_link';

    const XML_PATH_DISABLE_BLOCK_ORDERS_LINK = 'manage_account_menu/general/active_orders_link';

    const XML_PATH_DISABLE_BLOCK_MY_CREDIT_CARDS_LINK = 'manage_account_menu/general/active_my_credit_cards_link';

    const XML_PATH_DISABLE_BLOCK_WISH_LIST_LINK = 'manage_account_menu/general/active_wish_list_link';

    /**
     * Constructs a new instance of the class.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        protected ScopeConfigInterface $scopeConfig)
    {}
    
    /**
     * Executes the observer and disables certain blocks based on configuration settings.
     *
     * @param Observer $observer The observer object.
     * @return void
     */
    public function execute(Observer $observer)
    {
        $configFlags = [
            self::XML_PATH_DISABLE_BLOCK_DELIMITER_1,
            self::XML_PATH_DISABLE_BLOCK_DELIMITER_2,
            self::XML_PATH_DISABLE_BLOCK_ACCOUNT_LINK,
            self::XML_PATH_DISABLE_BLOCK_ADDRESS_LINK,
            self::XML_PATH_DISABLE_BLOCK_ACCONT_EDIT_LINK,
            self::XML_PATH_DISABLE_BLOCK_DOWNLOADABLE_PRODUCTS_LINK,
            self::XML_PATH_DISABLE_BLOCK_NEWSLETTER_SUBSCRIPTIONS_LINK,
            self::XML_PATH_DISABLE_BLOCK_BILLING_AGREEMENTS_LINK,
            self::XML_PATH_DISABLE_BLOCK_PRODUCT_REVIEWS_LINK,
            self::XML_PATH_DISABLE_BLOCK_ORDERS_LINK,
            self::XML_PATH_DISABLE_BLOCK_MY_CREDIT_CARDS_LINK,
            self::XML_PATH_DISABLE_BLOCK_WISH_LIST_LINK
        ];

        $blockNames = [
            'customer-account-navigation-delimiter-1',
            'customer-account-navigation-delimiter-2',
            'customer-account-navigation-account-link',
            'customer-account-navigation-address-link',
            'customer-account-navigation-account-edit-link',
            'customer-account-navigation-downloadable-products-link',
            'customer-account-navigation-newsletter-subscriptions-link',
            'customer-account-navigation-billing-agreements-link',
            'customer-account-navigation-product-reviews-link',
            'customer-account-navigation-orders-link',
            'customer-account-navigation-my-credit-cards-link',
            'customer-account-navigation-wish-list-link'
        ];

        if (!$this->scopeConfig->isSetFlag(self::XML_PATH_IS_ENABLED, ScopeInterface::SCOPE_STORE)) {
            return;
        }

        $layout = $observer->getLayout();

        foreach ($configFlags as $index => $flag) {
            if (!$this->scopeConfig->isSetFlag($flag, ScopeInterface::SCOPE_STORE)) {
                $block = $layout->getBlock($blockNames[$index]);
                if ($block) {
                    $layout->unsetElement($blockNames[$index]);
                }
            }
        }
    }
}