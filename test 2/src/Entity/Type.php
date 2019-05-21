<?php

namespace App\Entity;

class Type 
{

    const TYPE_FEU = 1;
    const TYPE_EAU = 2;
    const TYPE_PLANTE = 3;
    const TYPE_NORMAL = 4;

    public function strongAgainst($typeATK, $typeDEF)
    {
        if($typeATK === self::TYPE_EAU) {
            return (self::TYPE_FEU === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_FEU) {
            return (self::TYPE_PLANTE === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_PLANTE) {
            return (self::TYPE_EAU === $typeDEF) ? true : false;
        }
    }

    public function weakAgainst()
    {
        if($typeATK === self::TYPE_FEU) {
            return (self::TYPE_EAU === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_PLANTE) {
            return (self::TYPE_FEU === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_EAU) {
            return (self::TYPE_PLANTE === $typeDEF) ? true : false;
        }
    }
}





?>