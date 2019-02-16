<?php

namespace HCGCloud\Pterodactyl\Resources;

class Server extends Resource
{
    /**
     * The id of the server.
     *
     * @var integer
     */
    public $id;
	
    /**
     * The external id of the server.
     *
     * @var integer
     */
    public $externalId;

    /**
     * The uuid of the server.
     *
     * @var integer
     */
    public $uuid;

    /**
     * The short uuid of the server.
     *
     * @var string
     */
    public $identifier;

    /**
     * The node id of the server.
     *
     * @var string
     */
    public $node;

    /**
     * The name of the server.
     *
     * @var string
     */
    public $name;

    /**
     * The description of the server.
     *
     * @var string
     */
    public $description;
	
    /**
     * The suspended status of the server.
     *
     * @var integer
     */
    public $suspended;

    /**
     * The pack id for the server.
     *
     * @var integer
     */
    public $pack;

    /**
     * The date/time the server was created.
     *
     * @var string
     */
    public $createdAt;

    /**
     * The date/time the server was updated.
     *
     * @var string
     */
    public $updatedAt;

    /**
     * The attributes of the server.
     *
     * @var array
     */
    public $attributes = [];

    /**
     * The limits of the server.
     *
     * @var array
     */
    public $limits = [];

    /**
     * The allocations of the server.
     *
     * @var array
     */
    public $allocations = [];

    /**
     * Delete the given server.
     *
     * @return void
     */
    public function delete()
    {
        return $this->pterodactyl->deleteServer($this->id);
    }
	
    /**
     * Force delete the given server.
     *
     * @return void
     */
    public function forceDelete()
    {
        return $this->pterodactyl->forceDeleteServer($this->id);
    }

    /**
     * Suspend the server.
     *
     * @return void
     */
    public function suspend()
    {
        return $this->pterodactyl->suspendServer($this->id);
    }

    /**
     * Unsuspend the server.
     *
     * @return void
     */
    public function unsuspend()
    {
        return $this->pterodactyl->unsuspendServer($this->id);
    }

    /**
     * Update the server.
     *
     * @return void
     */
    public function update(array $data)
    {
        return $this->pterodactyl->updateServer($this->id, $data);
    }
    /**
     * Reinstall the server.
     *
     * @return void
     */
    public function reinstall()
    {
        return $this->pterodactyl->reinstallServer($this->id);
    }
	
    /**
     * Rebuild the server.
     *
     * @return void
     */
    public function rebuild()
    {
        return $this->pterodactyl->rebuildServer($this->id);
    }

    /**
     * Power the server.
     *
     * @return void
     */
    public function power($action)
    {
        return $this->pterodactyl->powerServer($this->identifier, $action);
    }

    /**
     * Power the server.
     *
     * @return void
     */
    public function command($command)
    {
        return $this->pterodactyl->commandServer($this->identifier, $command);
    }
}
