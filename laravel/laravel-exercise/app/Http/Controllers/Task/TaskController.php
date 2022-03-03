<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\TaskCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * This is Task controller.
 * This handles Task CRUD processing.
 */
class TaskController extends Controller
{
    /**
     * task interface
    */
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * To show create task view
     * 
     * @return View create task
    */
    public function showTaskCreateView()
    {
        $taskList = $this->taskInterface->getTaskList();
        return view('tasks', compact('taskList'));
    }

    /**
     * To check task create form and redirect to create page.
     * @param TaskCreateRequest $request Request form task create
     * @return View task create 
     */
    public function submitTaskCreateView(TaskCreateRequest $request)
    {
        $validator = Validator::make($request->all(),[$request]);

        if ($validator->fails()) {
            return redirect('/task')
                ->withInput()
                ->withErrors($validator);
        }

        $task = $this->taskInterface->saveTask($request);
        return redirect()->route('create.task');
    }

    /**
     * To delete task by id
     * @return View task list
     */
    public function deleteTaskById($taskId)
    {
        $msg = $this->taskInterface->deleteTaskById($taskId);
        return redirect('/task')->with(['msg' => $msg]);
    }

    
}
