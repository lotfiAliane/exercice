<?php 
namespace Exo\UserBundle\Entity;
use Exo\CarnetBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity
 *@ORM\Table(name="user")
 */
class User extends BaseUser{
	/**
	 *@ORM\Id
	 *@ORM\Column(type="integer")
	 *@ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;


 
   
	public function __construct(){
		parent::__construct();
		
	}
}