<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude('bootstrap/cache')
    ->exclude('storage')
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP80Migration'                       => true,
        '@PHP80Migration:risky'                 => true,
        '@PHPUnit84Migration:risky'             => true,
        '@PSR12'                                => true,
        '@PSR12:risky'                          => true,
        '@PhpCsFixer'                           => true,
        '@PhpCsFixer:risky'                     => true,
        'yoda_style'                            => false,
        'phpdoc_summary'                        => false,
        'single_line_comment_style'             => false,
        'phpdoc_separation'                     => false,
        'final_internal_class'                  => false,
        'php_unit_internal_class'               => false,
        'php_unit_test_class_requires_covers'   => false,
        'php_unit_method_casing'                => false,
        'no_unreachable_default_argument_value' => false,
        'binary_operator_spaces'                => [
            'operators' => [
                '=>' => 'align_single_space',
            ],
        ],
    ])
    ->setFinder($finder)
;

return $config;
