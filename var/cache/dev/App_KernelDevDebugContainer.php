<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerTwLPeuc\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerTwLPeuc/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerTwLPeuc.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerTwLPeuc\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerTwLPeuc\App_KernelDevDebugContainer([
    'container.build_hash' => 'TwLPeuc',
    'container.build_id' => 'dfcf6859',
    'container.build_time' => 1722009362,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerTwLPeuc');
