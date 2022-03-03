<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * post interface
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
     * To show create post view
     * 
     * @return View create post
    */
    public function showTaskCreateView()
    {
        $taskList = $this->taskInterface->getTaskList();
        return view('tasks', compact('taskList'));
    }

    /**
     * To check post create form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post create confirm
     */
    public function submitTaskCreateView(Request $request)
    {
        // validation for request values
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/task')
                ->withInput()
                ->withErrors($validator);
        }

        $post = $this->taskInterface->saveTask($request);
        return redirect()->route('create.task');
    }

    /**
     * To delete post by id
     * @return View post list
     */
    public function deleteTaskById($taskId)
    {
        $msg = $this->taskInterface->deleteTaskById($taskId);
        return redirect('/task')->with(['msg' => $msg]);
    }

    
}
