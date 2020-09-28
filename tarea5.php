<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */
if(!defined('_PS_VERSION_'))
	exit;
	
use Symfony\Component\Form\FormBuilderInterface;

class Tarea5 extends Module
{
	private $_html = '';
	
	public function __construct()
	{
		$this->name = 'tarea5';
	    $this->tab = 'front_offices_features';
		$this->version = '1.0.0';
		$this->author = 'ana';
		$this->ps_version_compliancy = array('min' => '1.5', 'max' => _PS_VERSION_);
		
		$this->need_instance = 0;
		$this->bootstrap = true;
		
		parent::__construct();
		
		$this->displayName = $this->l('Tarea 5');
		$this->description = $this->l('Genera texto en ficha de productos, editable desde BO');
		
	}

	public function install()
    {
		if(
			!parent::install() ||
			!$this->registerHook('displayHome')
		){
			return false;
		}

		return true;
    }
	
	public function uninstall()
	{
		if(
			!parent::uninstall() OR
			!$this->unregisterHook('displayHome')
		){
			return false;
		}
		
		return true;
	}
	
	public function hookDisplayHome()
    {
        return $this->display(__FILE__, 'displayAdminProducts.tpl');
    }

	/*public function displayAdminProductsMainStepLeftColumnMiddle ()
	{
		return $this->display(__FILE__, 'views/templates/hook/displayAdminProducts.tpl');
	}
*/
	public function getFormData()
	{
		$form_data = [
		'guia' => $this->product->guia];
		return 'HOLA';

	}


/**
     * {@inheritdoc}
     *
     * Builds form
     */

	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $is_stock_management = $this->configuration->get('PS_STOCK_MANAGEMENT');
        $builder->add('extra', 'PrestaShopBundle\Form\Admin\Type\TranslateType', array(
    'type' => 'Symfony\Component\Form\Extension\Core\Type\TextareaType',
    'options' => [
        'attr' => array('class' => 'autoload_rte'),
        'required' => false
    ],
    'locales' => $this->locales,
    'hideTabs' => true,
    'label' =>  $this->translator->trans('guia', [], 'Admin.Global'),
    'required' => false
));
}
   
	

}
