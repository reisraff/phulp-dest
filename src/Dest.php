<?php

namespace Phulp\Dest;

use Phulp\Source;

class Dest implements \Phulp\PipeInterface
{
    /**
     * @var string $path
     */
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param Source $src
     */
    public function execute(Source $src)
    {
        foreach ($src->getDistFiles() as $distFile) {
            $dir = $this->path;

            /** @var DistFile $distFile */
            $filename = $distFile->getDistpathname();
            $dsPos = strrpos($filename, DIRECTORY_SEPARATOR);

            if ($dsPos) {
                $dir .= DIRECTORY_SEPARATOR . substr($filename, 0, $dsPos);
            }

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            file_put_contents(
                $this->path . DIRECTORY_SEPARATOR . $filename,
                $distFile->getContent()
            );
        }
    }
}
