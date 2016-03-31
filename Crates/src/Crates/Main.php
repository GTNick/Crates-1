<?php

namespace Crates;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\event\Listener;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

use pocketmine\item\Item;

use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener{
	
	public $cooldown = array();
	
	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getServer()->getLogger()->info("[Crates]Enabled");
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,array("crate-open-message" => "You won items!","vote-key" => 0,"ultra-key" => 0,"legendary-key" => 0,"unique-key" => 0,"normal-key" => 0,"vote-key-commands" => array("givemoney {player} 1000"),"ultra-key-commands" => array("givemoney {player} 1000"),"legendary-key-commands" => array("givemoney {player} 1000"),"unique-key-commands" => array("givemoney {player} 1000"),"normal-key-commands" => array("givemoney {player} 1000"),"vote-key-items" => array(1,2,3),"ultra-key-items" => array(1,2,3),"legendary-key-items" => array(1,2,3),"unique-key-items" => array(1,2,3),"normal-key-items" => array(1,2,3)));
	}
	
	public function onInteract(\pocketmine\event\player\PlayerInteractEvent $ev){
		$p = $ev->getPlayer();
		$block = $ev->getBlock();
		$cfg = $this->config->getAll();
		if($block->getId() === 54){
			if($p->getInventory()->getItemInHand()->getId() === $cfg["vote-key"]){
				foreach($cfg["vote-key-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("vote-key-commands")){
						foreach($cfg["vote-key-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["ultra-key"]){
				foreach($cfg["ultra-key-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("ultra-key-commands")){
						foreach($cfg["ultra-key-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["legendary-key"]){
				foreach($cfg["legendary-key-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("legendary-key-commands")){
						foreach($cfg["legendary-key-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["unique-key"]){
				foreach($cfg["unique-key-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("unique-key-commands")){
						foreach($cfg["unique-key-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["normal-key"]){
				foreach($cfg["normal-key-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("normal-key-commands")){
						foreach($cfg["normal-key-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
		}
	}
}