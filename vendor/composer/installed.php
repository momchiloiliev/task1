<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => null,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => null,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'giggsey/libphonenumber-for-php' => array(
            'pretty_version' => '8.13.46',
            'version' => '8.13.46.0',
            'reference' => 'b75c463fce43a61cc206ea18cd5f2cc3ed5e6555',
            'type' => 'library',
            'install_path' => __DIR__ . '/../giggsey/libphonenumber-for-php',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'giggsey/libphonenumber-for-php-lite' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '8.13.46',
            ),
        ),
        'giggsey/locale' => array(
            'pretty_version' => '2.6',
            'version' => '2.6.0.0',
            'reference' => '37874fa473131247c348059fb7b8985efc18b5ea',
            'type' => 'library',
            'install_path' => __DIR__ . '/../giggsey/locale',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.31.0',
            'version' => '1.31.0.0',
            'reference' => '85181ba99b2345b0ef10ce42ecac37612d9fd341',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
