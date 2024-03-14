<?php

namespace App\Livewire\Orders\Style;

use Aaran\Orders\Models\Style;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public string $desc = '';

    public function getSave(): string
    {
            if ($this->vname != '') {

                if ($this->vid == "") {
                    Style::create([
                        'vname' => Str::upper($this->vname),
                        'desc' => Str::ucfirst($this->desc),
                        'active_id' => $this->active_id,
                    ]);
                    $message = "Saved";

                } else {
                    $obj = Style::find($this->vid);
                    $obj->vname = Str::upper($this->vname);
                    $obj->desc = Str::ucfirst($this->desc);
                    $obj->active_id = $this->active_id ?: '0';
                    $obj->save();
                    $message = "Updated";
                }

                $this->desc = '';
                return $message;
            }
        return '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Style::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->desc = $obj->desc;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'id';

        return Style::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.orders.style.index')->with([
            'list' => $this->getList()
        ]);
    }
}
