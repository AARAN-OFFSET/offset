<?php

namespace App\Livewire\Taskmanager\Task;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Task;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public string $client_id;
    public string $body;
    public mixed $cdate;
    public string $channel;
    public string $allocated;
    public string $status;

    public $tags;
    public $users;
    public $clients;
    public $commentsCount;
    public $verified;
    public $verified_on;

    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->users = User::all()->where('tenant_id','=',session()->get('tenant_id'));
        $this->clients = Client::all()->where('company_id','=',session()->get('company_id'));
    }

    public function getSave(): string
    {
        if ($this->vname) {

            if ($this->vid == "") {
                Task::create([
                    'client_id' => $this->client_id,
                    'title' => $this->vname,
                    'body' => $this->body,
                    'channel' => $this->channel,
                    'allocated' => $this->allocated,
                    'verified' => $this->verified,
                    'verified_on' => $this->verified_on,
                    'user_id' => Auth::user()->id,
                    'status' => 1,
                    'company_id' => session()->get('company_id'),
                    'active_id' => $this->active_id ? 1 : 0
                ]);
                $message = "Saved";

            } else {
                $obj = Task::find($this->vid);
                $obj->client_id = $this->client_id;
                $obj->title = $this->vname;
                $obj->body = $this->body;
                $obj->channel = $this->channel;
                $obj->allocated = $this->allocated;
                $obj->verified = $this->verified;
                $obj->verified_on = $this->verified_on;
                $obj->status = $this->status;
                $obj->company_id = session()->get('company_id');
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }

            $this->client_id = '';
            $this->vname = '';
            $this->body = '';
            $this->channel = '';
            $this->allocated = '';
            $this->verified = '';
            $this->verified_on = '';
            $this->status = '';

            return $message;
        }
        return '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Task::find($id);
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->vname = $obj->title;
            $this->body = $obj->body;
            $this->channel = $obj->channel;
            $this->allocated = $obj->allocated;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->status = $obj->status;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'id';


        return Task::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->where('user_id', '=', Auth::id())
            ->orWhere('allocated', '=', Auth::id())
            ->where('status', '!=', 100)
            ->with('user',)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender(): void
    {
        $this->render();
    }
    public function render()
    {
        return view('livewire.taskmanager.task.index', [
            'list' => $this->getList()
        ]);
    }
}
