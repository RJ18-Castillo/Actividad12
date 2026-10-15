<?php

namespace App\Exceptions;

use Exception;

// No aparece en la foto: se deduce de throw new GrupoLleno().
class GrupoLleno extends Exception {}
