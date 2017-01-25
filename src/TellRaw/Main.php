<?php

namespace iRaw;

/*
 * 
 * 
 * 
 */

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\player\PlayerJoinEvent;


class Main extends PluginBase implements Listener {
		
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		if($sender instanceof Player) {
			$player = $args[1]->getPlayer()->getName();
			$message = $args[2]->getMessage();
			if(strtolower($command->getName('raw'))) {
				if(empty($args[0])) {
					$sender->sendMessage("-----------------------------------------\nCommands For iRaw: (Page 1/1)\n- /raw tell <player> <message>\n/raw say <message>\n/raw tell - Tells a player a raw message \n/raw say - Sends a raw message to server\n-----------------------------------------");
				}
					if($args[0] == "tell") {
						$sent = $this->getServer()->getPlayerExact($args[1]);
						$message = $this->getServer()->getMessage($args[2]);
						if($sent->isOnline() == true) {
						$message = $array["message"];
						$sender-> sendMessage("------------------------------------------\n" .  $message . "\nWas successfully sent to " . $sent . "\nYour name is not shown Unless you've entered\nYour name in the Message!\n------------------------------------------");
						$args[1]->getPlayerExact->sendMessage("$message");
							return true;
						}
						if(!$args[1] instanceof Player) {
							$sender->sendMessage("iRaw] $sent is not online.");
							return true;
						}
						if(!$args[1] = 0) {
							$sender->sendMessage("iRaw] You Must Enter A Message!");
							$sender->sendMessage("Usage: /raw tell <player> <message>")
						} else {
							$sender->sendMessage("iRaw] Usage: /raw tell <player> <message>");
						}
					}
					if(args[0] == "say") {
						$message = $this->getServer()->getMessage($args[1]);
		                $sender->getServer()->broadcastMessage($message);
					}
						if(!$args[1] = 0) {
							$sender->sendMessage("iRaw] You Must Enter A Message!");
							$sender->sendMessage("Usage: /raw say <message>")
					} else {
						$sender->sendMessage("iRaw] Usage: /raw say <message>");
					}
						   
		}
