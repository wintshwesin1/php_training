<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Task
 */
interface TaskDaoInterface
{
    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request);

    /**
     * To get task list
     * @return array $taskList Task list
     */
    public function getTaskList();

    /**
     * To delete task by id
     * @param string $id task id
     * @return string $message message success or not
     */
    public function deleteTaskById($id);

  
}
