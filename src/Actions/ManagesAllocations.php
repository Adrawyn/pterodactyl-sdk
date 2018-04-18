<?php

namespace Fruitbytes\Pterodactyl\Actions;

use Fruitbytes\Pterodactyl\Resources\Allocation;

trait ManagesAllocations
{
    /**
     * Get the collection of allocations for a given node.
     *
     * @param  string $nodeId
     * @return Allocation[]
     */
    public function allocations($nodeId)
    {
        return $this->transformCollection(
            $this->get("admin/nodes/$nodeId")['included'],
            Allocation::class
        );
    }
}
