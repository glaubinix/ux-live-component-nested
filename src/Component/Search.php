<?php declare(strict_types=1);

namespace App\Component;

use App\Type\PizzaRequest;
use App\Type\PizzaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('search')]
class Search extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    private const ENTRIES = [
        ['label' => 'Calzone', 'category' => 'pizza'],
        ['label' => 'Steak', 'category' => 'not-pizza'],
        ['label' => 'Flatbread', 'category' => 'pizza'],
        ['label' => 'Pasta', 'category' => 'not-pizza'],
    ];

    private PizzaRequest $request;

    public function __construct()
    {
        $this->request = new PizzaRequest();
    }

    public function getEntries(): array
    {
        $entries = self::ENTRIES;
        if ($this->request->category !== null) {
            $entries = array_filter($entries, fn (array $entry) => $entry['category'] === $this->request->category);
        }

        return $entries;
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(PizzaType::class, $this->request);
    }
}
