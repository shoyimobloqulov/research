<?php

namespace App\Livewire;

use App\Models\Listening;
use App\Models\ListeningResult;
use Livewire\Component;

class LineChart extends Component
{
    public $chartData;

    public function mount($listening_id)
    {
        $listening = Listening::with('results')->findOrFail($listening_id);

        $datasets = [];
        $labels = [];

        $correctAnswers = $listening->results->pluck('total_correct')->toArray();

        $datasets[] = [
            'label' => 'Listening result ' . $listening->id. " ",
            'data' => $correctAnswers,
            'borderColor' => 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ',1)',
            'backgroundColor' => 'rgba(0,0,0,0)',
            'fill' => true,
        ];

        $labels = range(1, count($correctAnswers));
        $this->chartData = [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }

    public function render()
    {
        return view('livewire.line-chart');
    }
}
