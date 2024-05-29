<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view ('users.index')->with('users', $users);

    }
    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();
        return redirect('/user')->with('success', 'User created successfully.');
    }

    public function show(string $id): View
    {
        $user = User::find($id);
        return view('users.show')->with('users', $user);
    }
    public function edit(string $id): View
    {
        $user = User::find($id);
        return view('users.edit')->with('users', $user);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Exclude current user from unique validation
        ]);
        $user->update($validatedData);
        return redirect('user')->with('flash_message', 'Student updated successfully!');
    }
    public function destroy(string $id): RedirectResponse
    {
        User::destroy($id);
        return redirect('user')->with('flash_message', 'Student deleted!'); 
    }
    public function projects($userId)
    {
        try {
            $user = User::findOrFail($userId);
            $projects = $user->projects()->paginate(5);
            return view('projects.index', compact('user', 'projects'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    }
    public function createProject($userId)
    {
        $user = User::findOrFail($userId);
        return view('projects.create', ['userId' => $userId]);
    }
    
    public function storeProject(Request $request, $userId): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'Title' => 'required',  // Correct the typo here
            'description' => 'required',
        ]);
    
        // Find the user or fail
        $user = User::findOrFail($userId);
    
        // Create a project associated with the user
        $user->projects()->create([
            'Title' => $request->Title,  // Ensure this matches the form input name
            'description' => $request->description,
        ]);
    
        // Redirect to the user's projects index with a success message
        return redirect()->route('projects.index', ['userId' => $userId])
            ->with('success', 'Project created successfully.');
    }
    public function editProject($userId, $projectId)
{
    $user = User::findOrFail($userId);
    $project = Project::findOrFail($projectId);

    return view('projects.edit', compact('user', 'project'));
}
public function updateProject(Request $request, $userId, $projectId)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $project = Project::findOrFail($projectId);
    $project->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
    ]);

    return redirect()->route('projects.index', ['userId' => $userId])
        ->with('success', 'Project updated successfully');
}
public function deleteProject($userId, $projectId)
{
    try {
        $user = User::findOrFail($userId);
        $project = $user->projects()->findOrFail($projectId);
        $project->delete();

        return redirect()->route('projects.index', ['userId' => $userId])
            ->with('success', 'Project deleted successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('projects.index', ['userId' => $userId])
            ->with('error', 'Project not found');
    }
}

}    