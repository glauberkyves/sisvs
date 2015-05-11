<?php
namespace Datasus\Core\BaseBundle\ServiceLayer;

use \Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;

abstract class MessageService
{
    private static $messages = null;
    private static $session = null; 

    static private function loadMessages()
    {
        if (! self::$messages) {
            self::$messages = array();
            // Get Symfony to interface with this existing session
            self::$session = new Session(new PhpBridgeSessionStorage());
            $ds = DIRECTORY_SEPARATOR;
        	$fp = fopen('..'.$ds.'..'.$ds.'..'.$ds.'..'.$ds.'..'.$ds.'app'.$ds.'Resources'.$ds.'messages'.$ds.'list.csv', 'r');
            while (($cols = fgetcsv($fp, 0, "\t")) !== false) {
                if ($cols[0]) {
                    self::$messages[$cols[0]] = array();
                    self::$messages[$cols[0]][$cols[1]] = $cols[2];
                }
            }
        }
    }

    static public function getMessage($type, $code)
    {
    	return self::$messages[$type][$code];
    }

    static public function addMessage($type, $code)
    {
        self::loadMessages();
    	self::$session->getFlashBag()->add($type, self::getMessage($type, $code));
    }
}