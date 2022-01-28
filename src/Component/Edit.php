<?php declare(strict_types=1);

namespace App\Component;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('edit')]
class Edit
{
    use DefaultActionTrait;

    #[LiveProp(writable: false)]
    public bool $isEdit = false;
    #[LiveProp(writable: false)]
    public string $label;

    public function mount(array $entry)
    {
        $this->label = $entry['label'];
    }

    #[LiveAction]
    public function showEdit(): void
    {
        $this->isEdit = true;
    }

    #[LiveAction]
    public function cancelEdit(): void
    {
        $this->isEdit = false;
    }
}
