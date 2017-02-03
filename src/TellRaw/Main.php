<?php

namespace iRaw;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{CommandSender, Command};
use pocketmine\Player;
use pocketmine\Server;


class Main extends PluginBase {
	
	CONST HELP = "-----------------------------------------\nCommands For [iRaw]: (Page 1/1)\n- /raw tell <player> <message>\n/raw say <message>\n/raw tell - Tells a player a raw message \n/raw say - Sends a raw message to server\n-----------------------------------------";
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		if($sender instanceof Player) {
			if(strtolower($command->getName('raw'))) {
				if(empty($args[0])) {
					$sender->sendMessage( Self::HELP );
				}
					if($args[0] === "tell") {
						if (!isset($args[1])){
							$sender->sendMessage("[iRaw] You Must Enter A Message!");
							$sender->sendMessage("Usage: /raw tell <player> <message>");
						}
						if ( ! ( $sent = $this->getServer()->getPlayer($args[1]) ) instanceof Player ) {
							$sender->sendMessage("[iRaw] $sent is not online.");
							return true;
						} else {
							array_shift($args);
							unset($args[1]);
							$message = "";
							foreach($args as $m){
								$message .= $m." ";
							}
							$sender->sendMessage("Message was successfully sent to ".$sent);
							$sent->sendMessage($message);
							return true;
						}
					}
					if(args[0] === "say") {
						array_shift($args);
						$message = "";
						foreach($args as $m){
							$message .= $m ." ";
						}
		              			Server::getInstance()->broadcastMessage($message);
						
						if(count($args) < 1) {
							$sender->sendMessage("[iRaw] You Must Enter A Message!");
							$sender->sendMessage("Usage: /raw say <message>");
						}
					
					} else {
						return $sender->sendMessage( Self::HELP );
					}
			}
		}
	}

