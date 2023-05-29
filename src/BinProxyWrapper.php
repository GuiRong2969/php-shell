<?php

namespace Guirong\Shell;

/**
 * @internal
 */
final class BinProxyWrapper
{
    private $handle;
    private $position;
    private $realpath;

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        // get rid of phpvfscomposer:// prefix for __FILE__ & __DIR__ resolution
        $opened_path = substr($path, 17);
        $this->realpath = realpath($opened_path) ?: $opened_path;
        $opened_path = $this->realpath;
        $this->handle = fopen($this->realpath, $mode);
        $this->position = 0;

        return (bool) $this->handle;
    }

    public function stream_read($count)
    {
        $data = fread($this->handle, $count);

        if ($this->position === 0) {
            $data = preg_replace('{^#!.*\r?\n}', '', $data);
        }

        $this->position += strlen($data);

        return $data;
    }

    public function stream_cast($castAs)
    {
        return $this->handle;
    }

    public function stream_close()
    {
        fclose($this->handle);
    }

    public function stream_lock($operation)
    {
        return $operation ? flock($this->handle, $operation) : true;
    }

    public function stream_seek($offset, $whence)
    {
        if (0 === fseek($this->handle, $offset, $whence)) {
            $this->position = ftell($this->handle);
            return true;
        }

        return false;
    }

    public function stream_tell()
    {
        return $this->position;
    }

    public function stream_eof()
    {
        return feof($this->handle);
    }

    public function stream_stat()
    {
        return array();
    }

    public function stream_set_option($option, $arg1, $arg2)
    {
        return true;
    }

    public function url_stat($path, $flags)
    {
        $path = substr($path, 17);
        if (file_exists($path)) {
            return stat($path);
        }

        return false;
    }
}
