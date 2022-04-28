<?php

declare(strict_types=1);

namespace Magento2\SetupContents\Setup\Patch\Data;

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class Footer
 * @package Magento2\SetupContents\Setup\Patch\Data
 * phpcs:ignoreFile
 *
 * @codeCoverageIgnore
 */
class Footer implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var BlockFactory
     */
    private $blockFactory;
    /**
     * @var \Magento\Cms\Model\ResourceModel\Block
     */
    private $blockResource;

    /**
     * AddNewCmsBlock constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     * @param \Magento\Cms\Model\ResourceModel\Block $blockResource
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory,
        \Magento\Cms\Model\ResourceModel\Block $blockResource
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->blockResource = $blockResource;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $content = <<<HTML
<style>#html-body [data-pb-style=YLCXX4G]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=F7TYSVA],#html-body [data-pb-style=JBCHYJ7],#html-body [data-pb-style=KJAAFOY],#html-body [data-pb-style=N8D6NCO]{width:25%;align-self:stretch}#html-body [data-pb-style=DC54MGU],#html-body [data-pb-style=F7TYSVA],#html-body [data-pb-style=JBCHYJ7],#html-body [data-pb-style=KJAAFOY],#html-body [data-pb-style=N8D6NCO]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div class="footer-content" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="YLCXX4G"><div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="4" data-element="main"><div class="pagebuilder-column footer-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="F7TYSVA"><h4 data-content-type="heading" data-appearance="default" data-element="main">CATEGORIAS</h4><div data-content-type="text" data-appearance="default" data-element="main"><p>Peças&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Serviços&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Manutenção</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Sistema de Trocas</p></div></div><div class="pagebuilder-column footer-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="N8D6NCO"><h4 data-content-type="heading" data-appearance="default" data-element="main">INSTITUCIONAL</h4><div data-content-type="text" data-appearance="default" data-element="main"><p>Quem somos&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Nossa história&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Trabalhe Conosco</p></div></div><div class="pagebuilder-column footer-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="KJAAFOY"><h4 data-content-type="heading" data-appearance="default" data-element="main">AJUDA</h4><div data-content-type="text" data-appearance="default" data-element="main"><p>Política de Privacidade&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Política de Troca&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>Termos e Condições&nbsp;</p></div><div data-content-type="text" data-appearance="default" data-element="main"><p>FAQ Fale Conosco</p></div></div><div class="pagebuilder-column footer-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="JBCHYJ7"><h4 data-content-type="heading" data-appearance="default" data-element="main">SUPORTE</h4><div class="footer-telephone" data-content-type="text" data-appearance="default" data-element="main"><p>0800 023 2309&nbsp;</p></div><div class="footer-email" data-content-type="text" data-appearance="default" data-element="main"><p>ajuda@truck.com.br</p></div><div data-content-type="block" data-appearance="default" data-element="main">{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="6" type_name="CMS Static Block"}}</div></div></div></div></div><div class="footer-copy" data-content-type="row" data-appearance="full-bleed" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="main" data-pb-style="DC54MGU"><div data-content-type="text" data-appearance="default" data-element="main"><p>Truck Transport ©Todos os Direitos reservados.</p></div></div>
HTML;

        $blockIdentifier = 'Footer_Block';
        $cmsBlockModel = $this->blockFactory->create()->load($blockIdentifier, 'identifier');
        $cmsBlockId = $cmsBlockModel->getId();

        $cmsBlockCreate = [
          'block_id' => $cmsBlockId,
          'identifier' => $blockIdentifier,
          'title' => 'Footer_Block',
          'content' => $content,
          'stores' => [0]
        ];

        $cmsBlockModel->setData($cmsBlockCreate);
        $cmsBlockModel->save();

    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
