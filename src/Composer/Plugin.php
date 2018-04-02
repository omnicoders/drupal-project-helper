<?php

namespace OmniCoders\Drupal\ProjectHelper\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;

/**
 * Composer plugin for handling drupal projects.
 */
class Plugin implements PluginInterface, EventSubscriberInterface
{

    /**
     * @var \OmniCoders\Drupal\ProjectHelper\Composer\Handler
     */
    protected $handler;

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            PackageEvents::POST_PACKAGE_INSTALL => 'postPackageInstall',
            PackageEvents::POST_PACKAGE_UPDATE => 'postPackageUpdate',
            PackageEvents::POST_PACKAGE_UNINSTALL => 'postPackageUninstall',
            ScriptEvents::POST_INSTALL_CMD => 'postInstallCmd',
            ScriptEvents::POST_UPDATE_CMD => 'postUpdateCmd',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        // We use a separate PluginScripts object. This way we separate
        // functionality and also avoid some debug issues with the plugin being
        // copied on initialisation.
        // @see \Composer\Plugin\PluginManager::registerPackage()
        $this->handler = new Handler($composer, $io);
    }

    /**
     * Post package install event behaviour.
     *
     * @param \Composer\Installer\PackageEvent $event
     */
    public function postPackageInstall(PackageEvent $event)
    {
        $this->handler->onPostPackageEvent($event);
    }

    /**
     * Post package update event behaviour.
     *
     * @param \Composer\Installer\PackageEvent $event
     */
    public function postPackageUpdate(PackageEvent $event)
    {
        $this->handler->onPostPackageEvent($event);
    }

    /**
     * Post package uninstall event behaviour.
     *
     * @param \Composer\Installer\PackageEvent $event
     */
    public function postPackageUninstall(PackageEvent $event)
    {
        $this->handler->onPostPackageEvent($event);
    }

    /**
     * Post command install event callback.
     *
     * @param Event $event
     */
    public function postInstallCmd(Event $event)
    {
        $this->handler->onPostCmdEvent($event);
    }

    /**
     * Post command update event callback.
     *
     * @param Event $event
     */
    public function postUpdateCmd(Event $event)
    {
        $this->handler->onPostCmdEvent($event);
    }

}
