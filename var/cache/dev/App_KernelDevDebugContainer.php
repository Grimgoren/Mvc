<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7yxUVGw\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7yxUVGw/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container7yxUVGw.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container7yxUVGw\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container7yxUVGw\App_KernelDevDebugContainer([
    'container.build_hash' => '7yxUVGw',
    'container.build_id' => '10a7ff1b',
    'container.build_time' => 1719921810,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container7yxUVGw');
