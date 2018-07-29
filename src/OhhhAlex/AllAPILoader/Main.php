<?php

namespace OhhhAlex\AllAPILoader;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoadOrder;
use OhhhAlex\AllAPILoader\Loaders\AllFolderPluginLoader;
use OhhhAlex\AllAPILoader\Loaders\AllPharPluginLoader;
use OhhhAlex\AllAPILoader\Loaders\AllScriptPluginLoader;

class Main extends PluginBase {
  
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerInterface(AllPharPluginLoader::class);
      
        $this->getServer()->getPluginManager()->registerInterface(AllScriptPluginLoader::class);
      
        if ($this->getServer()->getPluginManager()->getPlugin("DevTools") instanceof Plugin or $this->getServer()->getPluginManager()->getPlugin("FolderPluginLoader") instanceof Plugin)
            $this->getServer()->getPluginManager()->registerInterface(AllFolderPluginLoader::class);
      
        $this->getServer()->getPluginManager()->loadPlugins($this->getServer()->getPluginPath(), [AllPharPluginLoader::class, AllScriptPluginLoader::class, AllFolderPluginLoader::class]);
        $this->getServer()->enablePlugins(PluginLoadOrder::STARTUP);
    }
}
