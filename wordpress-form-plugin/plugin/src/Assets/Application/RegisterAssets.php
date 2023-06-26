<?php

namespace Kp\Assets\Application;

use Kp\Assets\Domain\AssetsRepository;

class RegisterAssets
{
    private AssetsRepository $assetsRepository;

    public function __construct(AssetsRepository $assetsRepository)
    {
        $this->assetsRepository = $assetsRepository;
    }

    public function register()
    {
        $this->assetsRepository->registerUserScripts();
    }
}