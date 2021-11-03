<?php

namespace Awork\Model;

use Awork\Collections\ProjectStatusCollection;

class ProjectStatus
{
    private string $id;
    private string $name;
    private string $type;
    private bool $billableByDefault;
    private ?ProjectStatusCollection $projectStatuses;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->type = $data['type'] ?? '';
        $this->billableByDefault = $data['billableByDefault'] ?? false;
        $this->projectStatuses = isset($data['projectStatuses']) ? ProjectStatusCollection::fromArray($data['projectStatuses']) : null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getBillableByDefault(): bool
    {
        return $this->billableByDefault;
    }

    public function getProjectStatuses(): ?ProjectStatusCollection
    {
        return $this->projectStatuses;
    }
}
