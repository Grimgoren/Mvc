<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYd0UxDp\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYd0UxDp/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerYd0UxDp.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerYd0UxDp\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerYd0UxDp\App_KernelDevDebugContainer([
    'container.build_hash' => 'Yd0UxDp',
    'container.build_id' => '43d095fb',
    'container.build_time' => 1720103701,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYd0UxDp');
