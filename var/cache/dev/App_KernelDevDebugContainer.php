<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container5TXzxNa\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container5TXzxNa/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container5TXzxNa.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container5TXzxNa\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container5TXzxNa\App_KernelDevDebugContainer([
    'container.build_hash' => '5TXzxNa',
    'container.build_id' => '859b827f',
    'container.build_time' => 1722185650,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container5TXzxNa');
