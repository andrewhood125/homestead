<?php namespace Laravel\Homestead\Support;

final class Portability
{
    /**
     * Find the correct executable to run depending on the OS.
     *
     * @return string
     */
    public static function editor()
    {
        if (self::isWindows()) {
            return 'start';
        } elseif (self::isMac()) {
            return 'open';
        }

        return 'xdg-open';
    }

    /**
     * Set the dot file path in the environment.
     *
     * @return string
     */
    public static function setEnvironmentCommand()
    {
        if (self::isWindows()) {
            return 'SET VAGRANT_DOTFILE_PATH='.$_ENV['VAGRANT_DOTFILE_PATH'].' &&';
        }

        return 'VAGRANT_DOTFILE_PATH="'.$_ENV['VAGRANT_DOTFILE_PATH'].'"';
    }

    /**
     * Determine if the machine is running the Windows operating system.
     *
     * @return bool
     */
    private static function isWindows()
    {
        return strpos(strtoupper(PHP_OS), 'WIN') === 0;
    }

    /**
     * Determine if the machine is running OSX.
     *
     * @return bool
     */
    private static function isMac()
    {
        return strpos(strtoupper(PHP_OS), 'DARWIN') === 0;
    }
}
