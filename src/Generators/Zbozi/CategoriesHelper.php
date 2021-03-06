<?php

namespace Mk\Feed\Generators\Zbozi;


use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

class CategoriesHelper {

    CONST CATEGORY_URL = 'http://napoveda.seznam.cz/soubory/Zbozi.cz/category_ID.xls';

    /** @var \Nette\Caching\Cache */
    private $cache;

    function __construct(IStorage $storage = null)
    {
        if ($storage) {
            $this->cache = new Cache($storage, __CLASS__);
        }
    }

    public function getCategories()
    {
        $categories = array();
        if (!$this->cache || !($categories = $this->cache->load('categories'))) {
            $file = sys_get_temp_dir() . '/file.xls';
            file_put_contents($file, file_get_contents(self::CATEGORY_URL));

            $loaders = array(
                new Excel5FileLoader(new FileLocator()),
            );

            $resolver = new LoaderResolver($loaders);
            $loader = new DelegatingLoader($resolver);

            $data = $loader->load($file);
            #clear header
            unset($data[0]);

            foreach ($data as $row) {
                $categories[(int)$row[0]] = trim($row[2]);
            }
            asort($categories);
            unlink($file);

            if ($this->cache) {
                $this->cache->save('categories', $categories);
            }
        }

        return $categories;
    }
}


