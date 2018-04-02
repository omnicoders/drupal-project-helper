<?php

namespace OmniCoders\Drupal\ProjectHelper\Composer;

use Composer\Composer;
use Composer\DependencyResolver\Operation\InstallOperation;
use Composer\DependencyResolver\Operation\UpdateOperation;
use Composer\EventDispatcher\EventDispatcher;
use Composer\Installer\PackageEvent;
use Composer\IO\IOInterface;
use Composer\Package\PackageInterface;
use Composer\Script\Event;
use Composer\Semver\Semver;
use Composer\Util\Filesystem;
use Composer\Util\RemoteFilesystem;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

/**
 * Class Handler.
 *
 * @todo Improve class documentation.
 */
class Handler
{

    /**
     * @var \Composer\Composer
     */
    protected $composer;

    /**
     * @var \Composer\IO\IOInterface
     */
    protected $io;

    /**
     * Handler constructor.
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function __construct(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
    }

    /**
     * Marks scaffolding to be processed after an install or update command.
     *
     * @param PackageEvent $event
     */
    public function onPostPackageEvent(PackageEvent $event)
    {
        // @todo. Implement the onPostPackageEvent() method.
    }


    /**
     * Post install command event to execute the scaffolding.
     *
     * @param Event $event
     */
    public function onPostCmdEvent(Event $event)
    {
        // @todo. Implement the onPostCmdEvent() method.
    }

}
