<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'EcommPro_AjaxCartSwatches',
    isset($file) ? dirname($file) : __DIR__
);
