<?php

namespace Kp\Assets\Domain;

interface AssetsRepository
{
    public function registerUserScripts() : void;
    public function registerAdminUserScripts() : void;
}
