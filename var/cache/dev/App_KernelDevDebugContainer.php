<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerV3hwRc6\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerV3hwRc6/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerV3hwRc6.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerV3hwRc6\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerV3hwRc6\App_KernelDevDebugContainer([
    'container.build_hash' => 'V3hwRc6',
    'container.build_id' => '7dd4dd40',
    'container.build_time' => 1722344139,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerV3hwRc6');
