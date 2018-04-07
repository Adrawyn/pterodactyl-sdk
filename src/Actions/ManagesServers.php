<?php

namespace Fruitbytes\Pterodactyl\Actions;

use Fruitbytes\Pterodactyl\Resources\Server;

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
            $this->get('servers'),
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
        return new Server($this->get("servers/$serverId")['server'], $this);
    }

    /**
     * Create a new server.
     *
     * @param  array $data
     * @return Server
     */
    public function createServer(array $data)
    {
        return new Server($this->post('servers', $data)['server'], $this);
    }
}
