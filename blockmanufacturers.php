<?php
if (!defined('_PS_VERSION_'))
    exit;

class BlockManufacturers extends Module
{
    public function __construct()
    {
        $this->name = 'blockmanufacturers';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Angelo Maragna';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Block Manufacturers List');
        $this->description = $this->l('This block displays a list of manufacturers.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('BLOCKMANUFACTURERS_NAME'))
            $this->warning = $this->l('No name provided');
    }


    public function hookDisplayLeftColumn($params)
    {

        $this->context->smarty->assign(
            array(
                'manufacturers' => ManufacturerCore::getManufacturers(),
            )
        );
        return $this->display(__FILE__, 'blockmanufacturers.tpl');
    }


    public function install()
    {
        if (Shop::isFeatureActive())
            Shop::setContext(Shop::CONTEXT_ALL);


        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('BLOCKMANUFACTURERS_NAME', 'Block Manufacturers')
        )
            return false;

        return true;
    }


    public function uninstall()
    {
        if (!parent::uninstall() ||
            !Configuration::deleteByName('BLOCKMANUFACTURERS_NAME')
        )
            return false;

        return true;
    }



}