<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for task
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        
        return $task;
    }

    /**
     * To get task list
     * @return array $taskList Task list
     */
    public function getTaskList()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

     /**
     * To delete task by id
     * @param string $id task id
     * @return string $message message success or not
     */
    public function deleteTaskById($id)
    {
        $post = Task::find($id);
        if ($post) {
            $post->delete();
            return 'Deleted Successfully!';
        }
        return 'Task Not Found!';
    }

}
