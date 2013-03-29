<?php

namespace Magazento\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MagazentoUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
