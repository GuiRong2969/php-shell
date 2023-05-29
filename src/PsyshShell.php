<?php

namespace Guirong\Shell;

class PsyshShell
{
    /**
     * Run psysh shell
     *
     * @return void
     */
    public static function run()
    {
        $binPsysh = __DIR__ . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'psysh';
        if (PHP_VERSION_ID < 80000) {
            if ((function_exists('stream_get_wrappers') && in_array('phpvfscomposer', stream_get_wrappers(), true))
                || (function_exists('stream_wrapper_register') && stream_wrapper_register('phpvfscomposer', BinProxyWrapper::class))
            ) {
                include("phpvfscomposer://" . $binPsysh);
                exit(0);
            }
        }
        include($binPsysh);
    }
}
