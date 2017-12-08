<?php
/**
 * Created by PhpStorm.
 * User: pecalleja
 * Date: 12/12/2016
 * Time: 01:58 AM
 */
namespace AppBundle\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Block\Service\AbstractBlockService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Collections\Criteria;

class NumerosDashboardBlockService extends BaseBlockService
{
    protected $em;

    public function __construct($type, $templating, EntityManager $em, ContainerInterface $container)
    {
        $this->type = $type;
        $this->templating = $templating;
        $this->em = $em;
        $this->container = $container;
    }

    public function getName()
    {
        return 'numeros';
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array());
    }

    public function getDefaultSettings()
    {
        return array();
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $settings = array_merge($this->getDefaultSettings(), $blockContext->getBlock()->getSettings());
        
         $data = array(
            'actors' => count($this->em->getRepository("AppBundle:Actor")->findAll()),
            'genres' => count($this->em->getRepository("AppBundle:Genre")->findAll()),
            'movies' => count($this->em->getRepository("AppBundle:Movie")->findAll())
        );


        return $this->getTemplating()->renderResponse('@App/admin/block/numeros_dashboard.html.twig', array(
            'block' => $blockContext->getBlock(),
            'settings' => $settings,
            'data' => $data,
        ), $response);
    }


}