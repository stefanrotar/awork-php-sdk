<?php

namespace Awork\Api;

use Awork\Model\Task as TaskModel;
use Illuminate\Http\Client\Response;

class Task extends Endpoint
{
    public const ENDPOINT = 'tasks';

    public function getTask(string $taskId): TaskModel
    {
        return new TaskModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $taskId))->json()
        );
    }

    public function create(array $data): TaskModel
    {
        return new TaskModel(
            $this->api->post(self::ENDPOINT, $data)->json()
        );
    }

    public function update(string $taskId, array $data): TaskModel
    {
        return new TaskModel(
            $this->api->put(sprintf('%s/%s', self::ENDPOINT, $taskId), $data)->json()
        );
    }

    public function changeStatus(string $taskId, string $statusId): Response
    {
        return $this->api->post(self::ENDPOINT . '/changestatuses', [
            [
                'taskId' => $taskId,
                'statusId' => $statusId,
            ],
        ]);
    }
}
