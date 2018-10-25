<?php

namespace CrateUI\Commands;

use CrateUI\Main;
use pocketmine\utils\Config;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\Item;
use pocketmine\inventory\Inventory;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\level\Level;
use pocketmine\Server;
use pocketmine\Player;

class getkey extends Command{

    public function __construct($name){
         parent::__construct(
        $name
       );
	$this->setDescription("get crate key");
	$this->setAliases(["key"]);
	$this->setPermission("elixir.crate.key");
    }

    public function execute(CommandSender $sender, string $label, array $args){
        if (!$this->testPermission($sender)){
        return true;
        }
        $inv = $sender->getInventory();
        $commonname = Item::get(131,1,1);
        $votename = Item::get(131,2,1);
        $rarename = Item::get(131,3,1);
        $mythicname = Item::get(131,4,1);
        $legendaryname = Item::get(131,5,1);
        $e = Enchantment::getEnchantment(0);
        if (count($args) < 1){
            $sender->sendMessage("§7======== §l§dELIXIR§b CRATES§r§7 ========");
            $sender->sendMessage("§cUsage: §f/getkey §e{keyname}");
            $sender->sendMessage("§2Crates: §aCommon, Vote, Rare, Mythic, Legendary");
            $sender->sendMessage("§7======== §l§6REDEEMING  HELP§r§7 ========");
            $sender->sendMessage("§cUsage: §f/crate§r");
            $sender->sendMessage("§2Description: §aCrate Menu Command§r");
            $sender->sendMessage("§7======== §l§dELIXIR§b CRATES§r§7 ========");
            return false;
        }
        switch ($args[0]){
            case "1":
            case "common":
            case "Common":
            $e->setLevel(-1);
            $commonname->addEnchantment($e);
            $commonname->setCustomName("§l§7COMMON§r§f Key");
            $inv->addItem($commonname);
            $sender->sendMessage("§bYou Recieved a §l§7COMMON§r§b Crate Key!");
            break;
            case "2":
            case "vote":
            case "Vote":
            $e->setLevel(-1);
            $votename->addEnchantment($e);
            $votename->setCustomName("§l§9VOTE§r§f Key");
            $inv->addItem($votename);
            $sender->sendMessage("§bYou Recieved a §l§9VOTE§r§b Crate Key!");
            break;
            case "3":
            case "rare":
            case "Rare":
            $e->setLevel(-1);
            $rarename->addEnchantment($e);
            $rarename->setCustomName("§l§4RARE§r§f Key");
            $inv->addItem($rarename);
            $sender->sendMessage("§bYou Recieved a §l§4RARE§r§b Crate Key!");
            break;
            case "4":
            case "mythic":
            case "Mythic":
            $e->setLevel(-1);
            $mythicname->addEnchantment($e);
            $mythicname->setCustomName("§l§dMYTHIC§r§f Key");
            $inv->addItem($mythicname);
            $sender->sendMessage("§bYou Recieved a §l§dMYTHIC§r§b Crate Key!");
            break;
            case "5":
            case "legendary":
            case "Legendary":
            $e->setLevel(-1);
            $legendaryname->addEnchantment($e);
            $legendaryname->setCustomName("§a§lLEGENDARY§r§f Key");
            $inv->addItem($legendaryname);
            $sender->sendMessage("§bYou Recived a §l§aLEGENDARY§r§b Crate Key!");
        }
    }
}
