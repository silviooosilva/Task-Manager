<?php

namespace App;

class Helper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function mappingStatus(string $status)
    {
        $statusMapping = [
            '0' => 'To Do',
            '1' => 'Doing',
            '2' => 'Done'
        ];

        return $statusMapping[$status] ?? null;
    }
}
