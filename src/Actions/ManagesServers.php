<?php

namespace Fruitbytes\Pterodactyl\Actions;

use Fruitbytes\Pterodactyl\Resources\Server;
use Fruitbytes\Pterodactyl\Resources\Allocation;

trait ManagesServers
{

    /**
     * Get the collection of servers.
     *
     * @return Server[]
     */
    public function servers()
    {
        return $this->transformCollection(
            $this->get('api/application/servers')['data'],
            Server::class
        );
    }

    /**
     * Get a server instance.
     *
     * @param  string $serverId
     * @return Server
     */
    public function server($serverId)
    {
        $request = $this->get("api/application/servers/$serverId" . "?include=allocations");
        //print_r($request);
        $allocations = $this->transformCollection(
            $request['attributes']['relationships']['allocations']['data'],
            Allocation::class
        );

        $server = new Server($request, $this);

        $server->allocations = $allocations;

        return $server;
    }

    /**
     * Create a new server.
     *
     * @param  array $data
     * @return Server
     */
    public function createServer(array $data)
    {
        return new Server($this->post('api/application/servers', $data)['data'], $this);
    }

    /**
     * Delete the given server.
     *
     * @param  string $serverId
     * @return void
     */
    public function deleteServer($serverId)
    {
        return $this->delete("api/application/servers/$serverId");
    }

    /**
     * Suspend the given server.
     *
     * @param  string $serverId
     * @return void
     */
    public function suspendServer($serverId)
    {
        return $this->post("api/application/servers/$serverId/suspend");
    }

    /**
     * Unsuspend the given server.
     *
     * @param  string $serverId
     * @return void
     */
    public function unsuspendServer($serverId)
    {
        return $this->post("api/application/servers/$serverId/unsuspend");
    }
}
